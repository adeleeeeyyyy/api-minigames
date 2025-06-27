<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Leaderboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    public function sendVote($project_id) {
        $user = auth()->user();
        if ($user->total_vote == 2) {
            return response()->json([
                'message' => 'Vote limit reached',
            ], 422);
        }

        $leaderboard = null;
        DB::transaction(function () use ($project_id, $user, &$leaderboard) {
            $leaderboard = Leaderboard::where('project_id', '=', $project_id)->first();
            $leaderboard->increment('vote', 1);
            $user->increment('total_vote', 1);
        });

        return response()->json([
            'success' => true,
            'leaderboard' => $leaderboard
        ]);
    }

    public function seeProjects() {
        $projects = DB::table('leaderboards')->get();
        return response()->json([
            'success' => true,
            'projects' => $projects
        ]);
    }
}
