<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Developer;
use App\Models\User;
use App\Models\UserStat;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function registerVisitor(Request $request) {
        $request->validate([
            'email' => 'required|email',
        ]);

        $visitor = null;
        DB::transaction(function () use ($request, &$visitor) {
            $visitor_id = uniqid('visitor_');
            $visitor = Visitor::create([
                'visitor_id' => $visitor_id,
                'visitor_email' => $request->email
            ]);

            UserStat::create([
                'visitor_id' => $visitor_id,
                'point' => 0
            ]);
        });

        $token = $visitor->createToken("auth_token")->plainTextToken;
        return response()->json([
            'success' => true,
            'data' => $visitor,
            'token' => $token
        ]);
    }


    public function LoginVisitor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid fields',
                'errors' => $validator->errors(),
            ], 422);
        }

        $visitor = Visitor::where('visitor_email', '=', $request->email)->first();

        if ($visitor) {
            $token = $visitor->createToken("token")->plainTextToken;

            return response()->json(
                [
                    "status" => true,
                    "data" => $visitor,
                    "token" => $token,
                ]
            );


        } else {
            return response()->json([
                "message" => "Username or password incorrect"
            ], 401);
        }
    }

    public function loginDeveloper($developer_id) {
        $developer = Developer::where('developer_id', '=', $developer_id)->first();
        $token = $developer->createToken("auth_token")->plainTextToken;
        return response()->json([
            'success' => true,
            'data' => $developer,
            'token' => $token
        ]);
    }

    public function seeDivision() {
        $developer = Developer::get();
        return response()->json([
            'success' => true,
            'data' => $developer
        ]);
    }
}
