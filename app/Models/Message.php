<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'sender_type_id',
    'message_date',
    'name',
    'mobile',
    'email',
    'subject',
    'message',
    'user_id',
    ];
}
