<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    use HasFactory;

    protected $table = 'exams';

    protected $fillable = [
        'teacher_id',
        'quiz_data',
    ];
}
