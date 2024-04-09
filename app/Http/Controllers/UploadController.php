<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        // Handle image upload and save the image
        $imagePath = $request->file('file')->store('uploads', 'public');

        // Return the URL of the uploaded image
        return response()->json(['imageUrl' => asset('storage/' . $imagePath)]);
    }
}
