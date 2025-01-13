<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\Article;

class ArticleController extends Controller
{
    public function listarticle()
    {
        $articles = Article::orderByDesc('created_at')->get();
        $user = Auth::user();

        return view("components.profile.listarticle", compact('articles', 'user'));
    }

    public function upload(Request $request)
    {
        // if ($request->hasFile('upload')) {
        //     $file = $request->file('upload');
        //     $path = $file->store('uploads', 'public');
        //     $url = asset("storage/{$path}");
            
        //     return response()->json(['url' => $url]);
        // }

        // return response()->json(['message' => 'No file uploaded'], 400);

        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
    
            $url = asset('uploads/' . $filename);
    
            return response()->json([
                'uploaded' => true,
                'url' => $url
            ]);
        }
    
        return response()->json(['uploaded' => false]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        try {
            // Create a new instance of the Article model
            $article = new Article();

            // Assign values to the article attributes from the request inputs
            $article->title = $request->input('title');
            $article->description = $request->input('description');
            $article->author = Auth::user()->name;

            // Attempt to save the article to the database
            $saved = $article->save();

            // Check if the article was saved successfully
            if ($saved) {
                return response()->json(['message' => 'Article saved successfully'], 200);
            }
            else {
                return response()->json(['message' => 'Failed to save article'], 500);
            }
        } catch (QueryException $e) {
            // Handle database query exceptions
            return response()->json(['message' => 'Database error: ' . $e->getMessage()], 500);
        } catch (\Exception $e) {
            // Handle other exceptions
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function view(Article $articleId)
    {
        // echo $articleId;
        $article = Article::findOrFail($articleId->id);
        // echo $article->title;
        
        // $dodom = ['title' => 'John Doe', 'age' => 29];//Article::find($id);
        $data = [
            'title' => $article->title,
            'description' => $article->description,
            'author' => $article->author,
        ];
        return response()->json($data);
    }

    public function edit(Request $request, $articleId)
    {
        Log::info($request);
        $updatedData = $request->all();

        // // Find the article by ID and update it with the new data
        $article = Article::findOrFail($articleId);
        $article->update($updatedData);

        // // Optionally, you can return the updated article as JSON response
        return response()->json($request);
    }

    public function destroy(Article $articleId)
    {
        Log::info($articleId);
        $articleId->delete();
        return redirect()->route('article.listarticle')->with('success', 'Article deleted successfully');
    }

}
