<?php

namespace App\Http\Controllers;

use App\Models\Data_barang;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FormAddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $databarang = Data_barang::all();
        $number = 1;
        return view('index', [
            'data' => $databarang,
            'number' => $number
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'barcode_barang' => 'required',
                'nama_barang' => 'required',
                'harga_barang' => 'required|numeric',
                'satuan_barang' => 'required',
            ],
            [
                'harga_barang.required' => 'Tidak boleh memasukkan angka',
            ]
        );

        $addData = new Data_barang();
        $addData->barcode_barang = $request->barcode_barang;
        $addData->nama_barang = $request->nama_barang;
        $addData->harga_barang = $request->harga_barang;
        $addData->satuan_barang = $request->satuan_barang;
        $addData->save();

        if ($addData) {
            Alert::success('Success!', 'Berhasil Menambah data barcode');
            return redirect('/penjualan');
        } else {
            Alert::warning('Failed!', 'Gagal Menambah data barcode');
            return redirect('/penjualan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $databarang = Data_barang::find($id);
        return view('index', [
            'data' => $databarang
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $databarang = Data_barang::find($id);
        return view('update', [
            'data' => $databarang
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama_barang' => 'required',
                'harga_barang' => 'numeric',
                'satuan_barang' => 'required',
            ],
            [
                'harga_barang' => 'Harus memasukkan angka'
            ]
        );
        try {
            $update = Data_barang::find($id);
            $update->barcode_barang = $update->barcode_barang;
            $update->nama_barang = $request->nama_barang;
            $update->harga_barang = $request->harga_barang;
            $update->satuan_barang = $request->satuan_barang;
            $update->save();
            Alert::success('Success!', 'Berhasil mengubah data barcode' . ' ' . $update->barcode_barang);
            return redirect('/penjualan');
        } catch (Exception $e) {
            Alert::warning('Failed!', 'Gagal mengubah data barcode' . ' ' . $update->barcode_barang);
            return redirect('/penjualan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Data_barang::find($id);
        $delete->delete();

        if ($delete) {
            Alert::success('Success!', 'Berhasil Menghapus data barcode' . ' ' . $delete->barcode_barang);
            return redirect()->back();
        } else {
            Alert::warning('Failed!', 'Gagal Menghapus data barcode' . ' ' . $delete->barcode_barang);
            return redirect()->back();
        }
    }

    // public function form()
    // {
    //     $databarang = Data_barang::all();
    //     $number = 1;
    //     return view('show', [
    //         'data' => $databarang,
    //         'number' => $number
    //     ]);
    // }
}
