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
        'title',
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

    public function priorityColor()
    {
        $color = '';
        switch ($this->priority) {
            case 1:
                $color = 'bg-red-100';
                break;
            case 2:
                $color = 'bg-orange-100';
                break;
            case 3:
                $color = 'bg-yellow-100';
                break;
            case 4:
                $color = 'bg-green-100';
                break;
            case 5:
                $color = 'bg-blue-100';
                break;
        }
        return $color;
    }
}
