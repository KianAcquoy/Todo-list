<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Card;
use App\Models\Task;
use App\Models\User;
use App\Models\Board;
use App\Models\Label;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Board::factory(10)->create()->each(function (Board $board) {
            Label::factory(10)->create(['board_id' => $board->id]);
            Card::factory()->createMany([
                ['name' => 'To Do', 'description' => 'Description 1', 'order' => 1, 'board_id' => $board->id],
                ['name' => 'In Progress', 'description' => 'Description 2', 'order' => 2, 'board_id' => $board->id],
                ['name' => 'Done', 'description' => 'Description 3', 'order' => 3, 'board_id' => $board->id]
            ])->each(function ($card) use ($board) {
                Task::factory(3)->create(['card_id' => $card->id])->each(function ($task) use ($board) {
                    $task->labels()->attach(Label::all()->random(random_int(1, 5)));
                });
            });
        });
        User::factory(10)->create()->each(function (User $user) {
            $user->boards()->attach(Board::all()->random(6));
        });
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ])->each(function (User $user) {
            $user->boards()->attach(Board::all()->random(6));
        });
    }
}