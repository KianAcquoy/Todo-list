<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function tasks()
    {
        return $this->hasManyThrough(Task::class, Card::class);
    }

    public function getAllLabelsAttribute()
    {
        return $this->cards->flatMap(function ($card) {
            return $card->tasks->flatMap(function ($task) {
                return $task->labels;
            });
        });
    }

    public function createDefaultCards()
    {
        $this->cards()->createMany([
            [
                'name' => 'To Do',
                'description' => 'Description 1',
                'order' => 1,
            ],
            [
                'name' => 'In Progress',
                'description' => 'Description 2',
                'order' => 2,
            ],
            [
                'name' => 'Done',
                'description' => 'Description 3',
                'order' => 3,
            ],
        ]);
    }
}
