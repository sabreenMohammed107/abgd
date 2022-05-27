<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School_parent extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_id',
    'user_parent_id',
    ];
}
