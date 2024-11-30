<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

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
    // protected $dates = ['created_at'];
    // public function getYourDateColumnAttribute($value)
    // {
    //     return Date::createFromFormat('y-m-d H:i:s', $value)->format('Y/m/d');
    // }
}
