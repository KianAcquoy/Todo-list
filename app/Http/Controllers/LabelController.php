<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function store(Request $request, string $boardid)
    {
        // Find the board
        $board = Board::findOrFail($boardid);
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        $board->labels()->create([
            'name' => $request->input('name'),
            'color' => $request->input('color'),
            'icon' => $request->input('icon'),
        ]);

        return redirect()->route('boards.show', [
            'board' => $board,
            'show' => 'settings',
        ]);
    }

    public function destroy(string $labelid)
    {
        $label = Label::findOrFail($labelid);
        $board = $label->board;
        // Delete the label
        $label->delete();
        // Redirect to the board
        return redirect()->route('boards.show', [
            'board' => $board,
            'show' => 'settings',
        ]);
    }
}
