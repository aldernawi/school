<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teachar extends Model
{
    use HasFactory;

    protected $table = 'teachars';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function classes()
    {
        return $this->hasMany(classs::class, 'teacher_id');
    }
     public function classesWithStudents()
    {
        return $this->hasMany(classs::class, 'teacher_id')->with('students');
    }
}
