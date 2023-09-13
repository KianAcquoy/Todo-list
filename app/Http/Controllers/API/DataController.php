<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Board;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    public function saveBoard(Request $request)
    {
        // $user = User::find($request->user_id);
        $board = Board::find($request->board_id);
        $tasks = $board->tasks;
        $newtasks = $request->tasks;
        if (!$newtasks) {
            return response()->json([
                'success' => false,
                'message' => 'No tasks to save',
            ]);
        }
        
        foreach ($newtasks as $newtask) {
            $task = $tasks->where('id', $newtask['id'])->first();
            $task->update([
                'order' => $newtask['order'],
                'card_id' => $newtask['cardid'],
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Updated tasks',
        ]);
    }
}
