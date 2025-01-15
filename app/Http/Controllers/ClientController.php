<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function listclient()
    {
        $clients = Client::all();
        return view('components.profile.listclient', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $name = $request->input('name');
        $image = $request->file('image');

        $imageName = now()->format('Ymd_His') . '_' . strtolower(explode(' ', $name)[0]) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('storage/asset/clients'), $imageName);

        $client = new Client();
        $client->name = $name;
        $client->image_path = 'storage/asset/clients/' . $imageName;
        $client->save();

        return redirect()->route('clients.listclient')->with('success', 'Client added successfully!');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        if (file_exists(public_path($client->image_path))) {
            unlink(public_path($client->image_path));
        }
        $client->delete();

        return redirect()->route('clients.listclient')->with('success', 'Client deleted successfully!');
    }
}
