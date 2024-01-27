<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasi';
    protected $fillable = ['kode', 'id_user', 'id_gedung', 'total', 'tanggal', 'status', 'nama', 'email', 'no_hp', 'snap_token', 'payment_type', 'id_rekening'];
    protected $dates = ['tanggal', 'created_at', 'updated_at'];
}
