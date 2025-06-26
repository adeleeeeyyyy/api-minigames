<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Stamp;
use App\Models\UserStat;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

class StampController extends Controller
{
    public function seeStamp($visitor_id) {
        $stamp = DB::table('stamps')->where('visitor_id', '=', $visitor_id)->select('id','stamp_id', 'developer_stamp')->get();
        return response()->json([
            'success' => true,
            'stamp' => $stamp
        ], 200);
    }

    public function tes() {
        $developer = auth()->user();
        return response()->json([
            'success' => true,
            'data' => $developer
        ]);
    }

    public function sendStamp($visitor_id) {
        $developer = auth()->user();
        $visitor = Visitor::where('visitor_id', '=', $visitor_id)->first();
        $stamp = null;
         DB::transaction(function () use ($developer, $visitor, &$stamp) {
            $stamp_id = uniqid('stamp_');
            $stamp = Stamp::create([
                'stamp_id'=> $stamp_id,
                'developer_id'=> $developer->developer_id,
                'visitor_id'=> $visitor->visitor_id,
                'developer_stamp' => $developer->logo
            ]);

            $user_point = UserStat::where('visitor_id', '=', $visitor->visitor_id)->first();
            $user_point->increment('point', 1);
         });

         return response()->json([
            'success' => true,
            'data' => $stamp
         ]);
    }

    public function gacha($visitor_id)
    {
        $user_point = UserStat::where('visitor_id', $visitor_id)->firstOrFail();

        if ($user_point->point < 2) {
            return response()->json([
                'success' => false,
                'message' => 'not enough point'
            ], 402);
        }

        $user_point->decrement('point', 2);

        return response()->json([
            'success' => true,
            'data' => $user_point
        ]);
    }

    public function userStats($visitor_id) {
        $user_point = UserStat::where('visitor_id', '=', $visitor_id)->first();
        return response()->json([
            'success' => true,
            'data' => $user_point
        ]);
    }


}
