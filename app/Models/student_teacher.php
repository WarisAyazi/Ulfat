<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_teacher extends Model
{
    use HasFactory;
    protected $fillable = ([
        'students_id',
        'teachers_id',
    ]);
}
