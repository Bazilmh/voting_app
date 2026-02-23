<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // <--- ADD THIS LINE
use Illuminate\Support\Facades\Auth; // <--- ADD THIS LINE

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    $user = Auth::user();
    
    // Fetch candidates for the voting list
    $candidates = DB::table('election_candidates')->get();

    // If Admin, calculate results
    $results = [];
    if ($user->user_level === 'admin') {
        $results = DB::table('election_candidates')
            ->leftJoin('users', 'election_candidates.id', '=', 'users.voted_candidate_id')
            ->select('election_candidates.name', 'election_candidates.party_name', DB::raw('count(users.id) as total_votes'))
            ->groupBy('election_candidates.id', 'election_candidates.name', 'election_candidates.party_name')
            ->orderBy('total_votes', 'desc')
            ->get();
    }

    return view('home', compact('candidates', 'results'));
}


    public function castVote(Request $request)
{
    $request->validate([
        'candidate_id' => 'required|exists:election_candidates,id'
    ]);

    $user = Auth::user();

    // Check if user has already voted
    if ($user->voted_candidate_id !== null) {
        return back()->with('error', 'You have already cast your vote!');
    }

    // Save the candidate ID to the user table
    $user->voted_candidate_id = $request->candidate_id;
    $user->save();

    return back()->with('success', 'Vote cast successfully!');
}

}
