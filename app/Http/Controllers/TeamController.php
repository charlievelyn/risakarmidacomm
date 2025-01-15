<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function listteam()
    {
        $teams = Team::all();
        return view('components.profile.listteam', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $name = $request->input('name');
        $position = $request->input('position');
        $description = $request->input('description');
        $image = $request->file('image');

        $imageName = now()->format('Ymd_His') . '_' . strtolower(explode(' ', $name)[0]) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('storage/asset/teams'), $imageName);

        $team = new Team();
        $team->name = $name;
        $team->position = $position;
        $team->description = $description;
        $team->image_path = 'storage/asset/teams/' . $imageName;
        $team->save();

        return redirect()->route('team.listteam')->with('success', 'Team member added successfully!');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        if (file_exists(public_path($team->image_path))) {
            unlink(public_path($team->image_path));
        }
        $team->delete();

        return redirect()->route('team.listteam')->with('success', 'Team member deleted successfully!');
    }
}
