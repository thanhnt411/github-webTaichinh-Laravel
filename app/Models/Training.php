<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'training_course',
        'image',
        'description',
        'tuition_fee',
        'study_mode',
        'class_schedule'
    ];
}
