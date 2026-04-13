<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'started_at',
        'completed_at',
    ];

    protected $casts = [
        'started_at' => 'date',
        'completed_at' => 'date'
    ];

}
