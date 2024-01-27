<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembatalan extends Model
{
    use HasFactory;
    protected $table = 'pembatalan';
    protected $fillable = ['id_reservasi', 'alasan', 'status'];
    protected $dates = ['tanggal', 'created_at', 'updated_at'];
}
