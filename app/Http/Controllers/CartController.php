<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function update(Request $request)
    {
        try {
            $user = $request->user();
            if ($request->user()) {
                $userId = $user->get('id');
                return response()->json(['userId' => $userId], 200);
            } else {
                return response()->json(['success' => false], status: 401);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['success' => false, "message" => $e->getMessage()], status: 500);
        }
    }
}
