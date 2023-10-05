<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Task;

class ValidateUserTask
{
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        $task = Task::find($request->route('task'));

        // Check if the board exists
        if (!$task) {
            return abort(404, 'Board not found');
        }

        $board = $task->card->board;

        // Check if the user is connected to the board
        if (!$user->boards()->where('board_id', $board->id)->exists()) {
            return abort(403, 'User is not connected to the board');
        }

        // If all checks pass, continue with the request
        return $next($request);
    }

}