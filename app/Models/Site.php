<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    protected $table = 'site';
    protected $fillable = ['name', 'address', 'phone', 'email', 'facebook', 'twitter', 'instagram', 'whatsapp', 'description', 'logo', 'favicon', 'about', 'sk'];
}
