<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Why_us extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
    'title_en',
    'title_ar',
    'text_en',
    'text_ar',
    'order',
    ];
}
