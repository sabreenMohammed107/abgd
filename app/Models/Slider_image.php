<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider_image extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'title_en',
        'title_ar',
        'text_en',
        'text_ar',
        'order',
        'active',
    ];
}
