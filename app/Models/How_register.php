<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class How_register extends Model
{
    use HasFactory;
    protected $fillable = [
        'order',
    'title_en',
    'title_ar',
    'text_en',
    'text_ar',
    ];
}
