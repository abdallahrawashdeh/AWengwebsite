<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ClientController extends Controller
{

public function public()
{
    $careers = Client::latest()->get(); // You missed this line earlier
    return view('Test', compact('clients'));
}

public function index()
{
    $clients = Client::with('user')->latest()->get();
    return view('clients.index', compact('clients'));
}

public function create()
{
    return view('clients.create');
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'required|image|max:2048',
    ]);

    $imagePath = $request->file('image')->store('clients', 'public');

    Client::create([
        'title' => $request->title,
        'image' => $imagePath,
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('clients.index')->with('success', 'Client image added!');
}

public function show(Client $client)
{
    return view('clients.show', compact('client'));
}

public function edit(Client $client)
{
    return view('clients.edit', compact('client'));
}

public function update(Request $request, Client $client)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        Storage::disk('public')->delete($client->image);
        $client->image = $request->file('image')->store('clients', 'public');
    }

    $client->title = $request->title;
    $client->save();

    return redirect()->route('clients.index')->with('success', 'Client updated!');
}

public function destroy(Client $client)
{
    Storage::disk('public')->delete($client->image);
    $client->delete();
    return redirect()->route('clients.index')->with('success', 'Client deleted.');
}
}
