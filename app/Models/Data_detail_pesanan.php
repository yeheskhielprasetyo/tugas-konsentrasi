<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_detail_pesanan extends Model
{
    use HasFactory;

    protected $fillable = ['id_barang', 'id_user', 'id_pesanan', 'harga_barang', 'banyak', 'total'];

    protected $table = 'data_detail_pesanans';

    public function barang()
    {
        return $this->belongsTo(Data_barang::class, 'id_barang');
    }
}