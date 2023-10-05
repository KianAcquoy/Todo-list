<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('validate.user.board')->except(['index', 'create', 'store']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('board.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('board.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $board = Board::create($request->validate([
            'title' => 'required|string|max:30',
            'description' => 'nullable|string|max:500',
        ]));
        $board->users()->attach(auth()->user()->id);
        $board->createDefaultCards();
        return redirect()->route('boards.show', [
            'board' => $board,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $board = Board::findOrFail($id);
        return view('board.show', [
            'board' => $board,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $board = Board::findOrFail($id);
        return view('board.edit', [
            'board' => $board,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $board = Board::findOrFail($id);
        $request->validate([
            'title' => 'string|max:30',
            'description' => 'nullable|string|max:500',
        ]);
        $board->update($request->all());
        return redirect()->route('boards.show', [
            'board' => $board,
            'show' => 'settings',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
