<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function postAction(Request $request)
    {
        // Check if it's a POST request
        if (!$request->isMethod('post')) {
            return response()->json([
                "status" => 21,
                "desc" => "Bad Request Method not allowed"
            ], 400);
        }

        // Check if Authorization Bearer Token exists
        $bearerToken = $request->bearerToken();
        if (empty($bearerToken)) {
            return response()->json([
                "status" => 2,
                "desc" => "Bearer token is empty"
            ], 401);
        }

        return response()->json([
            "status" => 1,
            "desc" => "OK",
            "bearer_token" => $bearerToken
        ]);
    }
}
