<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Data_pesanan extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['id_barang', 'invoice', 'tgl_pesanan', 'total_pesanan'];

}
