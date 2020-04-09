<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\DataDiri;
use App\PenjualanTunai;
use App\PenjualanKredit;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PenjualanTunai::all();
        return view('penjualan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataDiri()
    {
        return view('penjualan.input_data_diri');
    }

    public function barang(Request $request){
        $barang = Barang::all();
        if($request->tipePenjualan == "tunai"){
            return view('penjualan.tunai', ['barangs' => $barang, 'dataDiri' => $request]);
        }
        else{
            return view('penjualan.kredit', ['barangs' => $barang, 'dataDiri' => $request]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTunai(Request $request)
    {
        $idBarang = DB::table('barangs')->select('id')->where('namaBarang', $request->namaBarang)->where('harga', $request->harga)->first();
        $data = new DataDiri;
        $data->nama = $request->nama;
        $data->noID = $request->noID;
        $data->alamat = $request->alamat;
        $data->noHP = $request->noHP;
        $data->email = $request->email;
        $data->save();


        $penjualanTunai = new PenjualanTunai;
        $penjualanTunai->user_id = $data->id;
        $penjualanTunai->barang_id = $idBarang->id;
        $penjualanTunai->kuantitas = $request->kuantitas;
        $penjualanTunai->total = $request->total;
        $penjualanTunai->tanggal = $request->tanggal;
        $penjualanTunai->no_transaksi = $request->no_transaksi;
        $penjualanTunai->save();

        return redirect('/penjualan');
    }
    public function storeKredit(Request $request)
    {
        $idBarang = DB::table('barangs')->select('id')->where('namaBarang', $request->namaBarang)->where('harga', $request->harga)->first();
        $data = new DataDiri;
        $data->nama = $request->nama;
        $data->noID = $request->noID;
        $data->alamat = $request->alamat;
        $data->noHP = $request->noHP;
        $data->email = $request->email;
        $data->save();


        $penjualanKredit = new PenjualanKredit;
        $penjualanKredit->user_id = $data->id;
        $penjualanKredit->barang_id = $idBarang->id;
        $penjualanKredit->kuantitas = $request->kuantitas;
        $penjualanKredit->total = $request->total;
        $penjualanKredit->tanggal = $request->tanggal;
        $penjualanKredit->deadline = $request->deadline;
        $penjualanKredit->alamat_pengiriman = $request->alamat_pengiriman;
        $penjualanKredit->no_transaksi = $request->no_transaksi;
        $penjualanKredit->save();

        return redirect('/penjualan');
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
