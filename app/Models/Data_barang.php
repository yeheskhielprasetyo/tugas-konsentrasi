<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_barang extends Model
{
    use HasFactory;

    protected $fillable = ['barcode_barang', 'nama_barang', 'harga_barang', 'satuan_barang'];

    protected $table = 'data_barangs';

    public function barang()
    {
        return $this->hasMany(Data_detail_pesanan::class, 'id_barang');
    }
}