<?php

namespace App\Http\Controllers;

use App\Models\TrainingEvents;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image; // Add this line



class TrainingEventsController extends Controller
{
    public function upload(Request $request)
    {
        $totalSize = array_reduce($request->file('images'), function ($carry, $file) {
            return $carry + $file->getSize();
        }, 0);
        // dd($totalSize);
        
        $maxCombinedSize = 10 * 1024 * 1024; // 10 MB
        
        if ($totalSize > $maxCombinedSize) {
            return back()->withErrors(['images' => 'The total size of all images may not be greater than 10 MB.']);
        }        
    
        $request->validate([
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|string|max:255',
        ], [
            'images.required' => 'You must upload at least one image.',
            'images.*.image' => 'Each file must be an image.',
            'images.*.mimes' => 'Each image must be a file of type: jpeg, png, jpg, gif, svg.',
            'images.*.max' => 'Each image may not be greater than 2048 kilobytes.',
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',
        ]);
        
        if ($request->hasfile('images'))
        {
            $title = $request->title;
            $titleFirstWord = explode(' ', trim($title))[0];
            $timestamp = now()->format('Ymd_His');
            $folderName = "{$timestamp}_{$titleFirstWord}";
    
            // Create folder if it doesn't exist
            $folderPath = public_path("storage/asset/trainings/{$folderName}");
            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, 0777, true);
            }
    
            foreach ($request->file('images') as $file)
            {
                $name = time().'_'.$file->getClientOriginalName();
                $file->move($folderPath, $name);
            }
            
            // Save path and title to database
            TrainingEvents::create(['path' => "storage/asset/trainings/{$folderName}", 'title' => $title]);
        }
    
        return back()->with('success', 'Training Events uploaded successfully.');
    }
    
    
      

    public function getImagePaths($id)
    {
        $event = TrainingEvents::find($id);

        $directoryPath = public_path($event->path);

        $imageFiles = [];
        if (File::exists($directoryPath)) {
            $files = File::files($directoryPath);
            foreach ($files as $file) {
                if (in_array($file->getExtension(), ['jpg', 'jpeg', 'png', 'gif', 'bmp'])) {
                    $imageFiles[] = asset($event->path . '/' . $file->getFilename());
                }
            }
        }

        return response()->json($imageFiles);
    }

    public function delete($id)
    {
        $event = TrainingEvents::find($id);

        // Get the folder path
        $folderPath = dirname(public_path($event->path));

        // Delete images within the folder
        if (File::exists($folderPath)) {
            File::deleteDirectory($folderPath);
        }

        // Delete the record from the database
        $event->delete();

        return back()->with('success', 'Training Event deleted successfully.');
    }

    public function listevents()
    {
        $trainingEvents = TrainingEvents::all();
        return view('components.profile.listtraining', compact('trainingEvents'));
    }
}
