<?php

namespace App\Http\Controllers;

use App\Models\Due;
use Illuminate\Http\Request;

class DueController extends Controller
{
    // Display a listing of the dues
    public function index()
    {
        $dues = Due::all();
        return view('dues.index', compact('dues'));
    }

    // Show the form for creating a new due
    public function create()
    {
        return view('dues.create');
    }

    // Store a newly created due in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'charges' => 'required|numeric',
            'association_id' => 'required|integer',
            'payable_faculties' => 'nullable|json',
            'payable_departments' => 'nullable|json',
            'payable_levels' => 'nullable|json',
        ]);

        Due::create($request->all());

        return redirect()->route('dues.index')->with('success', 'Due created successfully.');
    }

    // Display the specified due
    public function show(Due $due)
    {
        return view('dues.show', compact('due'));
    }

    // Show the form for editing the specified due
    public function edit(Due $due)
    {
        return view('dues.edit', compact('due'));
    }

    // Update the specified due in the database
    public function update(Request $request, Due $due)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'charges' => 'required|numeric',
            'association_id' => 'required|integer',
            'payable_faculties' => 'nullable|json',
            'payable_departments' => 'nullable|json',
            'payable_levels' => 'nullable|json',
        ]);

        $due->update($request->all());

        return redirect()->route('dues.index')->with('success', 'Due updated successfully.');
    }

    // Remove the specified due from the database
    public function destroy(Due $due)
    {
        $due->delete();

        return redirect()->route('dues.index')->with('success', 'Due deleted successfully.');
    }
}
