<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        return view('visitors.index', [
            'visitors' => Visitor::with('tour')->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('visitors.create', [
            'tours' => Tour::orderBy('title')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:visitors,email',
            'phone' => 'nullable|string|max:20',
            'visit_date' => 'required|date',
            'tour_id' => 'nullable|exists:tours,id',
        ]);

        if (!empty($data['tour_id'])) {
            $tour = Tour::withCount('visitors')->find($data['tour_id']);
            if ($tour->visitors_count >= $tour->capacity) {
                return back()->withInput()->with('error', 'This tour is already full.');
            }
        }

        Visitor::create($data);
        return redirect()->route('visitors.index')->with('success', 'Visitor added successfully.');
    }

    public function show(Visitor $visitor)
    {
        return view('visitors.show', ['visitor' => $visitor->load('tour')]);
    }

    public function edit(Visitor $visitor)
    {
        return view('visitors.edit', [
            'visitor' => $visitor,
            'tours' => Tour::orderBy('title')->get(),
        ]);
    }

    public function update(Request $request, Visitor $visitor)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:visitors,email,' . $visitor->id,
            'phone' => 'nullable|string|max:20',
            'visit_date' => 'required|date',
            'tour_id' => 'nullable|exists:tours,id',
        ]);
        $visitor->update($data);
        return redirect()->route('visitors.index')->with('success', 'Visitor updated successfully.');
    }

    public function destroy(Visitor $visitor)
    {
        $visitor->delete();
        return redirect()->route('visitors.index')->with('success', 'Visitor deleted.');
    }
}