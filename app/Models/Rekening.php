<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;
    protected $table = 'rekening';
    protected $fillable = [
        'id_bank',
        'no_rekening',
        'atas_nama',
        'cabang',
        'status'
    ];
}
