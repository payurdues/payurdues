<?php

namespace App\Http\Controllers;
use App\Models\Candidate;
use App\Models\Election;
use App\Models\Category;
use Illuminate\Http\Request;


class CandidateController extends Controller
{
    //
    
    public function index()
    {
        $candidates = Candidate::with('election', 'category')->latest()->get();
        return view('candidates.index', compact('candidates'));
    }

    public function create()
    {
        $elections = Election::all();
        $categories = Category::all();
        return view('candidates.create', compact('elections', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'full_name.*' => 'required|string|max:255',
            'alias.*' => 'nullable|string|max:255',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        // if ($request->hasFile('photo')) {
        //     $validated['photo'] = $request->file('photo')->store('candidates', 'public');
        // }

        $election_id = Category::find($request->category_id)?->election_id;

        foreach ($request->full_name as $index => $fullName) {
            $candidate = new Candidate();
            $candidate->full_name = $fullName;
            $candidate->alias = $request->alias[$index] ?? null;
            $candidate->category_id = $request->category_id;
            $candidate->election_id = $election_id;

            if (isset($request->image[$index])) {
                $path = $request->image[$index]->store('candidates', 'public');
                $candidate->image = $path;
            }

            $candidate->save();
        }

       return redirect()->route('elections.show', $election_id)->with('success', 'Candidate created successfully.');

        // return redirect()->route('candidates.index')->with('success', 'Candidate created successfully.');
    }

    public function show(Candidate $candidate)
    {
        return view('candidates.show', compact('candidate'));
    }

    public function edit(Candidate $candidate)
    {
        $elections = Election::all();
        $categories = Category::all();
        return view('candidates.edit', compact('candidate', 'elections', 'categories'));
    }

    public function update(Request $request, Candidate $candidate)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'election_id' => 'required|exists:elections,id',
            'category_id' => 'required|exists:categories,id',
            'photo' => 'nullable|image|max:2048',
            'description' => 'nullable|string'
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('candidates', 'public');
        }

        $candidate->update($validated);
        return redirect()->route('candidates.index')->with('success', 'Candidate updated successfully.');
    }

    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return redirect()->route('candidates.index')->with('success', 'Candidate deleted successfully.');
    }


}



