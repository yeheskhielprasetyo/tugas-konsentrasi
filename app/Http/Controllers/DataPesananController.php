<?php

namespace App\Http\Controllers;

use App\Models\Data_barang;
use App\Models\Data_detail_pesanan;
use App\Models\Data_pesanan;
use Illuminate\Http\Request;

class DataPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $number = 1;
        $totalharga = Data_detail_pesanan::select('total')->sum('total');
        $data_pesanan = Data_detail_pesanan::all();
        return view('data-pesanan', [
            'data' => $data_pesanan,
            'totalharga' => $totalharga,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // $request->validate(
        //     [
        //         'invoice' => 'string',
        //     ],
        //     [
        //         'invoice.string' => 'Invoice harus terinput',
        //     ]
        // );

        //     $data_pesanan = new Data_pesanan();
        //     $data_barang = Data_barang::where('id', $id)->first();
        //     $data_pesanan->invoice = $data_barang->id;
        //     $data_pesanan->invoice = 12333;
        //     $data_pesanan->total_pesanan = $
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
