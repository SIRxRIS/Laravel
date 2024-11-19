<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table ='pembayarans';

    protected $fillable = [
        'siswa_id',
        'jumlah',
        'tanggal pembayaran'
    ];

    public function siswa(){
        return $this->belongsTo(Siswa::class);
    }
} 

