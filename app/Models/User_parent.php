<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_parent extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'full_name',
        'gender',
        'child_no',
        'total_cost',
        'other_schools',
    ];
    public function schools()
    {
        return $this->belongsToMany(School::class, 'school_parents','user_parent_id','school_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
