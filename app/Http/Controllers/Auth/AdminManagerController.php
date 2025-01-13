<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PagesController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        ]);
    
        // Create the admin
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'is_admin' => 1,
        ]);
         //$request->input('is_admin') ? 1 : 0, // Ensure the checkbox value is correctly stored
    
        // Redirect to the admin list with success message
        return redirect()->route('admin.listuser')->with('success', 'Admin successfully created!');
    }    
    
    public function listuser()
    {
        // Fetch all admins
        $users = User::all();
        $admins = User::where('is_admin', true)->get();
    
        return view('components.profile.listuser', compact('admins'));
    }
    
    public function mainpage()
    {
        $pagesController = new PagesController(); 
        $result = $pagesController->initialize();

        return view('components.profile.mainpage', $result);
    }

    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();
    
        return redirect()->route('admin.listuser')->with('success', 'Admin successfully deleted!');
    }
    
}
