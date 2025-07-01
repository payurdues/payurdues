<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ElectionController extends Controller
{
    //
    public function index()
    {
        $now = Carbon::now();

        $elections = Election::all();

        $created = $elections->filter(function ($election) {
            return $election->status === 'created';
        });

        $ongoing = $elections->filter(function ($election) use ($now) {
            $start = Carbon::parse($election->voting_date . ' ' . $election->voting_time);
            $end = $start->copy()->addHours($election->voting_period);
            return $election->status === 'ongoing' && $now->between($start, $end);
        });

        $past = $elections->filter(function ($election) use ($now) {
            $start = Carbon::parse($election->voting_date . ' ' . $election->voting_time);
            $end = $start->copy()->addHours($election->voting_period);
            return $now->greaterThan($end);
        });

        return view('faculty.voting', compact('created', 'ongoing', 'past'));
    }

    public function create()
    {
        return view('faculty.create-election'); // 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'voting_date' => 'required|date',
            'voting_time' => 'required',
            'voting_period' => 'required|integer|min:1',
        ]);

        // Ensure association is authenticated
        if (!Auth::guard('association')->check()) {
            return redirect()->route('login');
        }

        $association_id = Auth::guard('association')->user()->id;

        $election = new Election;
        $election->title = $validated['title'];
        $election->voting_date = $validated['voting_date'];
        $election->voting_time = $validated['voting_time'];
        $election->voting_period = $validated['voting_period'];
        $election->association_id = $association_id;
        $election->save();

        return redirect()->route('election_index')->with('success', 'Election created successfully.');
    }

    public function show(Election $election)
    {
        // Optionally eager load relationships
        $election->load(['categories', 'association']);

        // dd($election);
        return view('faculty.view-election', compact('election'));
    }


}
