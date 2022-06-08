<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Other_schools_parent extends Model
{
    use HasFactory;
    protected $fillable = [
        'school',
    'user_parent_id',
    ];
    public function parent()
    {
        return $this->belongsTo(User_parent::class, 'user_parent_id');
    }
}
