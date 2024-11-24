<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_time extends Model
{
    use HasFactory;
    protected $fillable = ([
        'students_id',
        'times_id',
    ]);
}
