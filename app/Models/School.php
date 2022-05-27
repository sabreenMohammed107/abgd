<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;


    public function users()
    {
        return $this->belongsToMany(User_parent::class, 'school_parents','school_id','user_parent_id');
    }
}
