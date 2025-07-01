<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('categories.index', compact('categories'));
    }

    // Show the form to create a new category
    public function create()
    {
        return view('faculty.create-election-category');
    }

    // Store a new category in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
             'election_id' => 'required|integer|exists:elections,id',
        ]);

        Category::create($validated);

       return redirect()->route('elections.show', $request->election_id)->with('success', 'Category created successfully.');
    }

    // Show a single category (optional)
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    // Show the form to edit a category
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Update an existing category
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update($validated);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Delete a category
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}