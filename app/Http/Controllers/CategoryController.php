<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::withCount('exhibits')->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
        ]);
        Category::create($data);
        return redirect()->route('categories.index')->with('success', 'Category added successfully.');
    }

    public function show(Category $category)
    {
        return view('categories.show', ['category' => $category->load('exhibits')]);
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
        ]);
        $category->update($data);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        if ($category->exhibits()->exists()) {
            return back()->with('error', 'Cannot delete: this category still has exhibits.');
        }
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted.');
    }
}