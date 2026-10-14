<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Category;
use App\Models\Exhibit;
use Illuminate\Http\Request;

class ExhibitController extends Controller
{
    private function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'artist_id' => 'required|exists:artists,id',
            'year_created' => 'nullable|integer|min:1|max:' . date('Y'),
            'gallery_location' => 'required|string|max:100',
            'status' => 'required|in:on_display,in_storage,on_loan',
            'description' => 'nullable|string',
        ];
    }

    public function index()
    {
        return view('exhibits.index', [
            'exhibits' => Exhibit::with(['category', 'artist'])->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('exhibits.create', [
            'categories' => Category::orderBy('name')->get(),
            'artists' => Artist::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        Exhibit::create($request->validate($this->rules()));
        return redirect()->route('exhibits.index')->with('success', 'Exhibit added successfully.');
    }

    public function show(Exhibit $exhibit)
    {
        return view('exhibits.show', [
            'exhibit' => $exhibit->load(['category', 'artist', 'tours']),
        ]);
    }

    public function edit(Exhibit $exhibit)
    {
        return view('exhibits.edit', [
            'exhibit' => $exhibit,
            'categories' => Category::orderBy('name')->get(),
            'artists' => Artist::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Exhibit $exhibit)
    {
        $exhibit->update($request->validate($this->rules()));
        return redirect()->route('exhibits.index')->with('success', 'Exhibit updated successfully.');
    }

    public function destroy(Exhibit $exhibit)
    {
        $exhibit->delete();
        return redirect()->route('exhibits.index')->with('success', 'Exhibit deleted.');
    }
}