<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Board;

class ValidateUserBoard
{
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        $board = Board::find($request->route('board'));

        // Check if the board exists
        if (!$board) {
            return abort(404, 'Board not found');
        }

        // Check if the user is connected to the board
        if (!$user->boards()->where('board_id', $board->id)->exists()) {
            return abort(403, 'User is not connected to the board');
        }

        // If all checks pass, continue with the request
        return $next($request);
    }

}