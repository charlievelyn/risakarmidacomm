<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function show()
    {
        return view('pages.editor');
    }

    public function save(Request $request)
    {
        // Validate input if needed

        $content = $request->input('content');

        // Save content to database or perform any other action
        
        return redirect()->back()->with('success', 'Content saved successfully!');
    }
}
