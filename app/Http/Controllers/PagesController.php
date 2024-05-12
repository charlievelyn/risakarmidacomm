<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\Banner;
use App\Models\Client;
use App\Models\Team;
use App\Models\Training;
use App\Models\Value;

use App\Models\Article;

class PagesController extends Controller
{
    public function index(){
        $banners = Banner::all();
        $teamMembers = Team::all();
        $trainings = Training::all();
        $clients = Client::all();
        $values =  Value::all();

        return view("pages.home", compact('teamMembers', 'trainings', 'clients', 'values', 'banners'));
    }

    public function articles($articleId = null){
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);

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

    public function trainingevent(){
        $events = [
            ['name' => 'School Reunion 1', 'brief' => 'this is brief 1', 'image' => 'risa.jpeg', 'description' => 'this is description', 'folder' => 'school_reunion', 'author' => 'Risa', 'datetime' => '9 April 2024'],
            ['name' => 'School Reunion 2', 'brief' => 'this is brief 2', 'image' => 'risa.jpeg', 'description' => 'this is description', 'folder' => 'school_reunion', 'author' => 'Risa', 'datetime' => '9 April 2024'],
            ['name' => 'School Reunion 3', 'brief' => 'this is brief 3', 'image' => 'risa.jpeg', 'description' => 'this is description', 'folder' => 'school_reunion', 'author' => 'Risa', 'datetime' => '9 April 2024'],
        ];

        return view("pages.trainingevents", compact('events'));
    }

    public function contactus(){
        return view("pages.contactus");
    }
}
