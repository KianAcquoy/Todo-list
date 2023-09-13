<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Models\Board;

class ValidateUserBoard
{    public function handle($request, Closure $next)
    {
        $user = User::find($request->user_id);

        // Check if the user exists
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $board = Board::find($request->board_id);

        // Check if the board exists
        if (!$board) {
            return response()->json(['error' => 'Board not found'], 404);
        }

        // Check if the user is connected to the board
        if (!$user->boards()->where('board_id', $board->id)->exists()) {
            return response()->json(['error' => 'User is not connected to the board'], 403);
        }

        // If all checks pass, continue with the request
        return $next($request);
    }
}