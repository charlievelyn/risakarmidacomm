<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PagesController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminManagerController extends Controller
{
    /**
     * Show the form for creating a new admin.
     */
    public function create()
    {
        return view('components.profile.create');
    }

    /**
     * Store a newly created admin in the database.
     */
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', //'image' => 'nullable|image|max:2048', // Ensure 'file' rule is included
        ]);
    
        $imagePath = null;
        $db_imagePath = null;
    
        if ($request->hasFile('image')) {
            // Check if the file is valid
            $image = $request->file('image');
    
            if ($image->isValid()) {
                // Get current timestamp
                $originalName = $image->getClientOriginalName();
                $filename = pathinfo($originalName, PATHINFO_FILENAME);
                $firstThreeChars = substr($filename, 0, 3); // Take the first 3 characters
            
                // Optionally, you can add a timestamp to ensure uniqueness
                $timestamp = time();
                $newFilename = $firstThreeChars . '_' . $timestamp . '.' . $image->getClientOriginalExtension();
            
                // Define the directory path
                $directory = 'asset/misc';
                $db_imagePath = 'storage/' . $directory .'/'. $newFilename;
            
                // Create the directory if it doesn't exist
                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory);
                }
            
                // Store the image in the directory
                $imagePath = $image->storeAs($directory, $newFilename, 'public');
            } else {
                return back()->withErrors(['image' => 'Uploaded file is not valid.']);
            }
            
        }
    
        // Create the admin
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'image_path' => $db_imagePath,
            'is_admin' => $request->has('is_admin') ? 1 : 0, // Set is_admin based on checkbox
        ]);
    
        // Redirect to the admin list with success message
        return redirect()->route('admin.listuser')->with('success', 'Admin successfully created!');
    }
    
    public function changePassword(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ],
        ], [
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.confirmed' => 'The password confirmation does not match.',
            'password.regex' => 'The password must contain at least one number and one special character.',
        ]);
        
        // dd("halo");
    
        // Find the admin and update the password
        $admin = User::findOrFail($id);
        $admin->password = Hash::make($request->input('password'));
        $admin->save();
    
        return redirect()->route('admin.listuser')->with('success', 'Password successfully changed!');
    }    
    
    public function listuser()
    {
        // Fetch all admins
        $users = User::all();
        $admins = User::where('is_admin', true)->get();
    
        return view('components.profile.listuser', compact('admins', 'users'));
    }
    
    public function mainpage()
    {
        $pagesController = new PagesController(); 
        $result = $pagesController->initialize();

        return view('components.profile.mainpage', $result);
    }

    public function destroy($id)
    {
        $totalUser = User::all()->count();
        $admin = User::findOrFail($id);

        if($admin->is_admin = true && $totalUser <= 1){
            return redirect()->route('admin.listuser')->with('error', 'At least one admin is required!');
        } else {
            $admin->delete();
            return redirect()->route('admin.listuser')->with('success', 'Admin successfully deleted!');
        }
    }
}
