<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Board;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       Board::factory(10)->create()->each(function (Board $board) {
           $board->columns()->createMany([
               ['title' => 'To Do', 'description' => 'Description 1', 'order' => 1, 'board_id' => $board->id],
               ['title' => 'In Progress', 'description' => 'Description 2', 'order' => 2, 'board_id' => $board->id],
               ['title' => 'Done', 'description' => 'Description 3', 'order' => 3, 'board_id' => $board->id],
           ])->each(function ($column) use ($board) {
               $column->tasks()->createMany([
                   ['title' => 'Task 1', 'description' => 'Description 1', 'due_date' => now()->addDays(1), 'priority' => 1],
                   ['title' => 'Task 2', 'description' => 'Description 2', 'due_date' => now()->addDays(2), 'priority' => 2],
                   ['title' => 'Task 3', 'description' => 'Description 3', 'due_date' => now()->addDays(3), 'priority' => 3],
               ]);
           });
       });
       User::factory(10)->create()->each(function (User $user) {
           $user->boards()->attach(Board::all()->random(3));
       });
    }
}
