<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $teamMembers = [
            ['name' => 'John Doe', 'position' => 'CEO', 'image' => 'team1.jpeg'],
            ['name' => 'Jane Smith', 'position' => 'Designer', 'image' => 'team2.jpeg'],
            ['name' => 'Michael Johnson', 'position' => 'Developer', 'image' => 'team3.jpeg'],
            ['name' => 'Michael Johnson', 'position' => 'Developer', 'image' => 'team4.jpeg'],
            ['name' => 'Michael Johnson', 'position' => 'Developer', 'image' => 'team5.jpeg'],
            ['name' => 'Michael Johnson', 'position' => 'Developer', 'image' => 'team6.jpeg']
        ];
        return view("pages.home", compact('teamMembers'));
    }

    public function dashboard(){
        return view("pages.dashboard");
    }
}
