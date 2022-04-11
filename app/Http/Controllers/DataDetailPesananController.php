<?php

namespace App\Http\Controllers;

use App\Models\Data_barang;
use App\Models\Data_detail_pesanan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataDetailPesananController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate(
            [
                'harga_barang' => 'numeric',
                'banyak' => 'numeric',
            ],
            [
                'harga_barang.numeric' => 'Tidak boleh memasukkan selain angka',
                'banyak.numeric' => 'Tidak boleh memasukkan selain angka',
            ]
        );


        $addData = new Data_detail_pesanan();
        $barang = Data_barang::where('id',$id)->first();
        $addData->id_barang = $barang->id;
        $addData->id_user = 1;
        $addData->id_pesanan = 1;
        $addData->harga_barang = $barang->harga_barang;
        $addData->banyak = 6;
        $addData->total = $barang->harga_barang *= 6;
        $addData->save();

        if ($addData) {
            Alert::success('Success!', 'Berhasil Menambah data detail pesanan');
            return redirect('/form');
        } else {
            Alert::warning('Failed!', 'Gagal Menambah data detail pesanan');
            return redirect('/form');
        }
    }

    public function show($id)
    {
        $data_barang = Data_barang::where('id', $id)->first();
        return view('detail', [
            'data' => $data_barang
        ]);
    }

    public function updateDetailPesanan(Request $request)
    {
        $qty = $request->input('banyak');
        $detailPesanan = Data_detail_pesanan::where('id', $qty)->exists();

        if($detailPesanan){
            $delpesanan = Data_detail_pesanan::where('id', $qty)->first();
            $delpesanan->banyak = $qty;
            $delpesanan->save();
            return response()->json(['status' => "Quantity Updated"]);
        }


    }
}
