<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('validate.user.task')->except(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cardid = request()->query('cardid');
        $card = Card::findOrFail($cardid);
        return view('task.create', [
            'card' => $card,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'card_id' => 'required|exists:cards,id',
            'color' => 'string|max:255',
            'due_date' => 'nullable|date',
        ]);
        $card = Card::findOrFail($request->card_id);
        $task = Task::create(
            $request->only('name', 'description', 'card_id', 'color', 'due_date')
        );
        $task->save();
        if ($request->has('labels')) {
            $task->labels()->sync($request->input('labels'));
        }
        return redirect()->route('boards.show', ['board' => $card->board_id, 'show' => $task->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        return view('task.show', [
            'task' => $task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        return view('task.edit', [
            'task' => $task,
            'card' => $task->card,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
        $request->validate([
            'card_id' => 'required|exists:cards,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'color' => 'string|max:255',
            'due_date' => 'nullable|date',
        ]);
        $task->name = $request->name;
        $task->description = $request->description;
        $task->card_id = $request->card_id;
        $task->color = $request->color;
        $task->due_date = $request->due_date;
        $task->save();
        if ($request->has('labels')) {
            $task->labels()->sync($request->input('labels'));
        }
        return redirect()->route('boards.show', ['board' => $task->card->board, 'show' => $task->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('boards.show', ['board' => $task->card->board]);
    }
}
