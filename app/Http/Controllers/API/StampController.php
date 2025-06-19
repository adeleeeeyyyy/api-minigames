<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Stamp;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StampController extends Controller
{
    public function seeStamp($visitor_id) {
        $stamp = DB::table('stamps')->where('stamp_id', '=', $request->stamp_id)->first();
        return response()->json([
            'success' => true,
            'stamp' => $stamp
        ], 200);
    }

    public function sendStamp(Request $request) {
        $developer = auth()->user();
        $developer_id = $developer->developer_id;
        $visitor = Visitor::where('visitor_id', '=', $request->visitor_id)->first();
         

    }
}
