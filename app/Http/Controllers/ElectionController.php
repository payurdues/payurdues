<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ElectionController extends Controller
{
    //
    public function index()
    {
        $now = Carbon::now();
        if (!Auth::guard('association')->check()) {
            return redirect()->route('login');
        }

        $association_id = Auth::guard('association')->user()->id;
        $elections = Election::with([ 'categories', 'candidates', 'association'])->where('association_id',$association_id)->get();


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
        // dd($elections);
        return view('faculty.voting', compact('created', 'ongoing', 'past'));
    }


     public function members_index()
    {
        $now = Carbon::now();
        if (!Auth::guard('student')->check()) {
            return redirect()->route('login');
        }

        $student = Auth::guard('student')->user();

        
        $elections = Election::with([ 'categories', 'candidates', 'association'])->where('association_id',$student->association_id)->get();


       

        $ongoing = $elections->filter(function ($election) use ($now) {
            $start = Carbon::parse($election->voting_date . ' ' . $election->voting_time);
        // dd($start);

            $end = $start->copy()->addHours($election->voting_period);
            return $election->status === 'ongoing' && $now->between($start, $end);
        });

        // dd($ongoing);


        $past = $elections->filter(function ($election) use ($now) {
            $start = Carbon::parse($election->voting_date . ' ' . $election->voting_time);
            $end = $start->copy()->addHours($election->voting_period);
            return $now->greaterThan($end);
        });
        return view('student.voting', compact( 'ongoing', 'past','student'));
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
        $election->load(['candidates','categories', 'association']);

        // dd($election);
        return view('faculty.view-election', compact('election'));
    }

    public function membersShow(Election $election)
    {

         if (!Auth::guard('student')->check()) {
            return redirect()->route('login');
        }

        $student = Auth::guard('student')->user();
        $votes = Vote::where('student_id', $student->id)->where('election_id', $election->id)->pluck('candidate_id', 'category_id')->toArray();
        // Optionally eager load relationships
        $election->load(['candidates','categories', 'association']);
        $winners = [];

        foreach ($election->categories as $category) {
            $winner = $category->candidates()
                ->withCount(['votes' => function ($query) use ($election) {
                    $query->where('election_id', $election->id);
                }])
                ->orderByDesc('votes_count')
                ->first();

            if ($winner) {
                $winners[$category->id] = $winner->id;
            }
        }

        // dd($election);
        return view('student.view-election', compact('election','votes','student'));
    }

    public function viewResult(Election $election)
    {

         if (!Auth::guard('student')->check()) {
            return redirect()->route('login');
        }

        $student = Auth::guard('student')->user();
        $votes = Vote::where('student_id', $student->id)->where('election_id', $election->id)->pluck('candidate_id', 'category_id')->toArray();
        // Optionally eager load relationships
        $election->load(['candidates','categories', 'association']);
        $results = [];

        foreach ($election->categories as $category) {
            // Get all candidates in the category
            $candidates = $category->candidates()->withCount([
                'votes as total_votes' => function ($query) use ($election) {
                    $query->where('election_id', $election->id);
                }
            ])->get();

            // Determine the highest vote count
            $maxVotes = $candidates->max('total_votes');

            // Identify the winner(s)
            foreach ($candidates as $candidate) {
                $results[$category->id][] = [
                    'candidate' => $candidate,
                    'votes' => $candidate->total_votes,
                    'is_winner' => $candidate->total_votes == $maxVotes,
                ];
            }
        }
        // dd($election);
        return view('student.view-election-result', compact('election','votes','results','student'));
    }



}
