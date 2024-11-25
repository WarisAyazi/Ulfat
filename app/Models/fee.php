<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fee extends Model
{
    use HasFactory;
    protected $fillable = ([
        'amount',
        'month',
        'year',
        'students_id',
        'subjects_id',
        'teachers_id'
    ]);
}
