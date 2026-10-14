<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Category;
use App\Models\Exhibit;
use App\Models\Tour;
use App\Models\Visitor;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'counts' => [
                'Exhibits' => Exhibit::count(),
                'Categories' => Category::count(),
                'Artists' => Artist::count(),
                'Tours' => Tour::count(),
                'Visitors' => Visitor::count(),
            ],
            'latestExhibits' => Exhibit::with(['category', 'artist'])->latest()->take(5)->get(),
        ]);
    }
}