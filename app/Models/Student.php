<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'student_id',
        'name',
        'email',
        'password',
        'course',
        'year_level',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}