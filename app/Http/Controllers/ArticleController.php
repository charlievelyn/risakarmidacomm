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
    public function article()
    {
        $articles = Article::all();
        $user = Auth::user();

        return view("profile.db-article", compact('articles', 'user'));
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')){
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('media'),$fileName);

            $url = asset('media/'.$fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
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

    public function show(Article $article)
    {
        return response()->json($article);
    }

    public function update(Request $request, $articleId)
    {
        Log::info($request);
        $updatedData = $request->all();

        // // Find the article by ID and update it with the new data
        $article = Article::findOrFail($articleId);
        $article->update($updatedData);

        // // Optionally, you can return the updated article as JSON response
        return response()->json($request);
    }

    public function destroy(Article $article)
    {
        Log::info($article);
        $article->delete();
        return redirect()->route('db-article')->with('success', 'Article deleted successfully');
    }

}
