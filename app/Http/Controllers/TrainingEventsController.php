<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingEvents;
use Illuminate\Support\Facades\File;

class TrainingEventsController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
        ]);

        if ($request->hasfile('images'))
        {
            $title = $request->title;
            $titleFirstWord = explode(' ', trim($title))[0];
            $timestamp = now()->format('Ymd_His');
            $folderName = "{$timestamp}_{$titleFirstWord}";

            // Buat folder jika belum ada
            $folderPath = public_path("storage/asset/uploads/{$folderName}");
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, 0777, true);
            }

            foreach ($request->file('images') as $file)
            {
                $name = time().'_'.$file->getClientOriginalName();
                $file->move($folderPath, $name);

                // Simpan path dan title ke database
                TrainingEvents::create(['path' => "training_events/{$folderName}/{$name}", 'title' => $title]);
            }
        }

        return back()->with('success', 'Training Events uploaded successfully.');
    }

    public function getImagePaths($id)
    {
        // Get the training event by ID
        $event = TrainingEvents::find($id);

        // Get the path from the event
        $directoryPath = public_path($event->path);

        // Get all image files in the directory
        $imageFiles = [];
        if (File::exists($directoryPath)) {
            $files = File::files($directoryPath);
            foreach ($files as $file) {
                if (in_array($file->getExtension(), ['jpg', 'jpeg', 'png', 'gif', 'bmp'])) {
                    $imageFiles[] = $file->getRelativePathname();
                }
            }
        }

        // Return the image paths as JSON
        return response()->json($imageFiles);
    }

    public function view()
    {
        $trainingEvents = TrainingEvents::all();
        return view('components.profile.listtraining', compact('trainingEvents'));
    }
}
