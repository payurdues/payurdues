<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    //
    public function xstore(Request $request)
    {

        dd($request->all());
        $user = Auth::user();
        $election = Election::findOrFail($request->election_id); // Or however you're passing election ID

        $now = now();

        // ✅ Validate election is active
        $start = Carbon::parse($election->voting_date . ' ' . $election->voting_time);
        $end = $start->copy()->addHours($election->voting_period);

        if (!($now->between($start, $end))) {
            return back()->withErrors(['error' => 'Voting is not currently active for this election.']);
        }

        // ✅ Check if user already voted in this election
        $alreadyVoted = Vote::where('user_id', $user->id)
            ->where('election_id', $election->id)
            ->exists();

        if ($alreadyVoted) {
            return back()->withErrors(['error' => 'You have already voted in this election.']);
        }

        // ✅ Process vote
        $votes = $request->input('votes'); // ['category_id' => 'candidate_id']
        foreach ($votes as $categoryId => $candidateId) {
            Vote::create([
                'user_id' => $user->id,
                'election_id' => $election->id,
                'category_id' => $categoryId,
                'candidate_id' => $candidateId,
            ]);
        }

        return back()->with('success', 'Your vote has been recorded.');
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();

        $data = $request->validate([
            'votes' => 'required|array|min:1',
            'votes.*.election_id' => 'required|exists:elections,id',
            'votes.*.category_id' => 'required|exists:categories,id',
            'votes.*.candidate_id' => 'required|exists:candidates,id',
        ]);

        foreach ($data['votes'] as $vote) {
            $election = Election::find($vote['election_id']);

            // Validate voting period
            $start = Carbon::parse($election->voting_date . ' ' . $election->voting_time);
            $end = $start->copy()->addHours($election->voting_period);

            if (!now()->between($start, $end)) {
                return response()->json(['success' => false, 'message' => 'Voting is closed for this election.'], 403);
            }

            // Prevent duplicate votes
            $exists = Vote::where('student_id', $user->id)
                ->where('election_id', $vote['election_id'])
                ->where('category_id', $vote['category_id'])
                ->exists();

            if ($exists) {
                return response()->json([
                    'success' => false,
                    'message' => 'You have already voted for one of the categories.'
                ], 403);
            }

            // Store vote
            Vote::create([
                'student_id' => $user->id,
                'election_id' => $vote['election_id'],
                'category_id' => $vote['category_id'],
                'candidate_id' => $vote['candidate_id'],
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Your vote has been recorded successfully.'
        ]);
    }

}
