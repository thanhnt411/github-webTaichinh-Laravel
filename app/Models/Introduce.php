<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Introduce extends Model
{
    protected $fillable = [
        'heading',
        'sub_heading',
        'content',
        'image',
        'video',
        'video_title'
    ];
}
