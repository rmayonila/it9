<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transferee extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'contact_number',
        'previous_school',
        'program',
        'academic_year',
        'report_card_path',
        'good_moral_path',
        'birth_certificate_path',
    ];
}