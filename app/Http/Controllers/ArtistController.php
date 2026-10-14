<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    private function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'birth_year' => 'nullable|integer|min:1000|max:' . date('Y'),
            'death_year' => 'nullable|integer|gte:birth_year|max:' . date('Y'),
            'biography' => 'nullable|string',
        ];
    }

    public function index()
    {
        return view('artists.index', [
            'artists' => Artist::withCount('exhibits')->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('artists.create');
    }

    public function store(Request $request)
    {
        Artist::create($request->validate($this->rules()));
        return redirect()->route('artists.index')->with('success', 'Artist added successfully.');
    }

    public function show(Artist $artist)
    {
        return view('artists.show', ['artist' => $artist->load('exhibits')]);
    }

    public function edit(Artist $artist)
    {
        return view('artists.edit', compact('artist'));
    }

    public function update(Request $request, Artist $artist)
    {
        $artist->update($request->validate($this->rules()));
        return redirect()->route('artists.index')->with('success', 'Artist updated successfully.');
    }

    public function destroy(Artist $artist)
    {
        if ($artist->exhibits()->exists()) {
            return back()->with('error', 'Cannot delete: this artist still has exhibits.');
        }
        $artist->delete();
        return redirect()->route('artists.index')->with('success', 'Artist deleted.');
    }
}