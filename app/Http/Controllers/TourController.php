<?php

namespace App\Http\Controllers;

use App\Models\Exhibit;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    private function rules(bool $isNew): array
    {
        return [
            'title' => 'required|string|max:255',
            'exhibit_id' => 'required|exists:exhibits,id',
            'guide_name' => 'required|string|max:255',
            'tour_date' => $isNew ? 'required|date|after_or_equal:today' : 'required|date',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ];
    }

    public function index()
    {
        return view('tours.index', [
            'tours' => Tour::with('exhibit')->withCount('visitors')->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('tours.create', [
            'exhibits' => Exhibit::orderBy('title')->get(),
        ]);
    }

    public function store(Request $request)
    {
        Tour::create($request->validate($this->rules(true)));
        return redirect()->route('tours.index')->with('success', 'Tour added successfully.');
    }

    public function show(Tour $tour)
    {
        return view('tours.show', [
            'tour' => $tour->load(['exhibit', 'visitors']),
        ]);
    }

    public function edit(Tour $tour)
    {
        return view('tours.edit', [
            'tour' => $tour,
            'exhibits' => Exhibit::orderBy('title')->get(),
        ]);
    }

    public function update(Request $request, Tour $tour)
    {
        $tour->update($request->validate($this->rules(false)));
        return redirect()->route('tours.index')->with('success', 'Tour updated successfully.');
    }

    public function destroy(Tour $tour)
    {
        $tour->delete();
        return redirect()->route('tours.index')->with('success', 'Tour deleted (its visitors were removed too).');
    }
}