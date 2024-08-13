<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aboutMe extends Model
{
    use HasFactory;
    protected $fillable=[
        'header',
        'isi',
        'alamat',
        'no',
        'email',
    ];
}
