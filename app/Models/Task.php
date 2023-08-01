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
        'column_id',
        'due_date',
        'priority',
    ];

    public function column()
    {
        return $this->belongsTo(Column::class);
    }

    public function board()
    {
        return $this->belongsTo(Board::class);
    }
}
