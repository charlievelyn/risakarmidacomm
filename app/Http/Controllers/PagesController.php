<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function articles(){
        $articles = Article::orderBy('created_at', 'desc')->paginate(2);
        return view("pages.articles", compact('articles'));
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
