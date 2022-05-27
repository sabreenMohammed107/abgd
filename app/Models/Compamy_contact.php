<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compamy_contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'overview_title_en',
        'overview_title_ar',
        'overview_text_en',
        'overview_text_ar',
        'who_abgd_text_en',
        'who_abgd_text_ar',
        'why_us_text_en',
        'why_us_text_ar',
        'join_us_text_en',
        'join_us_text_ar',
        'how_register_text_en',
        'how_register_text_ar',
        'contact_us_text_en',
        'contact_us_text_ar',
        'address_en',
        'address_ar',
        'phones',
        'whatsapp',
        'email',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
    ];
}
