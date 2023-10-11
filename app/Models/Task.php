<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $casts = [
        'completed' => 'boolean',
    ];

    protected $fillable = [
        'name',
        'description',
        'card_id',
        'due_date',
        'priority',
        'order',
    ];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class);
    }
}
