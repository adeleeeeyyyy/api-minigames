<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
}
