<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quizzes extends Model
{
    use HasFactory;

    protected $table = 'quizzes';

    protected $fillable = [
        'user_id',
        'quiz_data',
    ];
}
