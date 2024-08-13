<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class konfigurasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'background',
        'profil',
        'facebook',
        'instagram',
        'linkedln',
    ];
}
