<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\Banner;
use App\Models\Client;
use App\Models\Team;
use App\Models\Training;
use App\Models\Value;
use App\Models\TrainingEvents; 

use App\Models\Article;

class PagesController extends Controller
{
    public function initialize(){
        
        $banners = Banner::all();
        $teamMembers = Team::all();
        $trainings = Training::all();
        $clients = Client::all();
        $values = Value::all();

        return [
            'banners' => $banners,
            'teamMembers' => $teamMembers,
            'trainings' => $trainings,
            'clients' => $clients,
            'values' => $values
        ];
    }

    public function index(){
        SEOMeta::setTitle('RKCTrainings - Your Gateway to Effective Content Creation');
        SEOMeta::setDescription('RKCTrainings is a provider of communication training for professional purposes, serving both corporations, governmental institutions, and regular classes for the public. Founded in 2019 under the legal entity PT Komunikasindo Media Prima, RKCTrainings is led by Risa Karmida, M.A., a media practitioner and lecturer at universities.');
        SEOMeta::setKeywords(['Communication Training', 'Content Creation', 'Photo and Video Documentation', 'Event and Talkshow', 'Public Speaking', 'Journalistic']);

        $data = $this->initialize();
        return view("pages.home", $data);
    }

    public function articles($articleId = null){
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        $previous_article = null;
        $next_article = null;

        if($articleId) {
            $main_article = Article::findOrFail($articleId);
        } else {
            $main_article = $articles->first(); // Fetch the current item based on some criteria
        }
        
        if ($main_article) {
            // Get the previous item
            $previous_article = Article::where('created_at', '<', $main_article->created_at)->orderBy('created_at', 'desc')->first();
            if (!$previous_article) {
                // If there is no previous item, loop back to the last item
                $previous_article = Article::orderBy('created_at', 'desc')->first();
                $previous_article->description = Str::limit(strip_tags($previous_article->description), 50, '...');
            }

            // Get the next item
            $next_article = Article::where('created_at', '>', $main_article->created_at)->orderBy('created_at')->first();
            if (!$next_article) {
                // If there is no next item, loop back to the first item
                $next_article = Article::orderBy('created_at')->first();
                $next_article->description = Str::limit(strip_tags($next_article->description), 50, '...');
            }
        }

        return view("pages.articles")->with([
            'articles' => $articles,
            'main_article' => $main_article,
            'previous_article' => $previous_article,
            'next_article' => $next_article,
        ]);
    }

    // public function articles($id = null)
    // {
    //     $main_article = Article::findOrFail($id);
    //     $previous_article = Article::where('id', '<', $id)->orderBy('id', 'desc')->first();
    //     $next_article = Article::where('id', '>', $id)->orderBy('id', 'asc')->first();
        
    //     if (request()->ajax()) {
    //         return response()->json([
    //             'main_article' => view('partials.main_article', compact('article', 'previous_article', 'next_article'))->render(),
    //         ]);
    //     }

    //     return view('pages.articles', compact('main_article', 'previous_article', 'next_article'));
    // }


    public function show_article($id){
        $article = Article::findOrFail($id);
        return view("pages.article", compact('article'));
    }

    public function team(){
        $teamMembers = Team::all();
        return view("pages.team", compact('teamMembers'));
    }

    public function clients(){
        $clients = Client::all();

        return view("pages.clients", compact('clients'));
    }


    public function trainingevent()
    {
        // Retrieve events from the database
        $trainingevents = TrainingEvents::all();
        
        // Format the event data
        $eventsData = $trainingevents->map(function ($event) {
            return [
                'title' => $event->title,
                'path' => $event->path,
                'images' => $this->getImagesFromFolder($event->path)
            ];
        });
        // dd($eventsData);
        return view("pages.trainingevents", ['trainingevents' => $eventsData]);
    }
    
    private function getImagesFromFolder($folderPath)
    {
        // 
        // Ensure the folder path is correct and exists
        $fullPath = public_path($folderPath);
        if (!File::exists($fullPath) || !File::isDirectory($fullPath)) {
            return [];
        }

        // Get all image files from the folder
        $files = File::files($fullPath);
        $images = [];
        foreach ($files as $file) {
            $filePath = $folderPath . '/' . $file->getFilename();
            $images[] = $filePath;
        }
        return $images;
    }

    public function fetchImages(Request $request)
    {
        // Get the folder path from the request
        $folderPath = $request->input('folderPath');
        
        // Ensure the folder path is correct and exists
        $fullPath = public_path($folderPath);
        if (!File::exists($fullPath) || !File::isDirectory($fullPath)) {
            return response()->json([], 404); // Return 404 if the folder does not exist
        }

        // Get all image files from the folder
        $files = File::files($fullPath);
        $images = [];
        foreach ($files as $file) {
            $filePath = $folderPath . '/' . $file->getFilename();
            $images[] = $filePath;
        }

        return response()->json($images);
    }


    

    public function contactus(){
        return view("pages.contactus");
    }
}
