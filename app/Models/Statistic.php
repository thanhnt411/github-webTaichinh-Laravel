<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = [
        'excerpt',
        'content',
        'image',
        'author'
    ];
}
