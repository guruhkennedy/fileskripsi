<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPembayaran extends Model
{
    use HasFactory;
    protected $table = 'bukti_pembayaran';
    protected $fillable = ['id_reservasi', 'id_user', 'gambar'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function create_parse()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->locale('id')->isoFormat('dddd, D MMM Y - HH:mm');
    }
}
