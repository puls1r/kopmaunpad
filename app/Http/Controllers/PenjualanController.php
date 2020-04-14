<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\DataDiri;
use App\PenjualanTunai;
use App\PenjualanKredit;
use App\BarangPembelian;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataTunai = DB::table('penjualan_tunais')
                    ->join('data_diris','penjualan_tunais.user_id','=','data_diris.id')
                    ->select('penjualan_tunais.*','data_diris.nama')
                    ->get();
        $dataKredit = DB::table('penjualan_kredits')
                    ->join('data_diris','penjualan_kredits.user_id','=','data_diris.id')
                    ->select('penjualan_kredits.*','data_diris.nama')
                    ->get();
        return view('penjualan.index', [
            'dataTunai' => $dataTunai,
            'dataKredit' => $dataKredit,
        ]);
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
        $petugas = Auth::user();
        $data = new DataDiri;
        $data->nama = $request->nama;
        $data->noID = $request->noID;
        $data->alamat = $request->alamat;
        $data->noHP = $request->noHP;
        $data->email = $request->email;
        $data->save();


        $penjualanTunai = new PenjualanTunai;
        $penjualanTunai->user_id = $data->id;
        $penjualanTunai->total = $request->totalPembelian;
        $penjualanTunai->tanggal = $request->tanggal;
        $numpadded = sprintf("%05d", getNextId('penjualan_tunais'));
        $prefix = "TN";
        $penjualanTunai->no_transaksi = $prefix.$numpadded;
        $penjualanTunai->petugas = $petugas->name;
        $penjualanTunai->save();

        if($request->namaBarang1 != "Pilih"){
        $idBarang1 = DB::table('barangs')->select('id')->where('namaBarang', $request->namaBarang1)->where('harga', $request->harga1)->first();
        $barangPembelian = new BarangPembelian;
        $barangPembelian->no_transaksi = $penjualanTunai->no_transaksi;
        $barangPembelian->barang_id = $idBarang1->id;
        $barangPembelian->kuantitas = $request->kuantitas1;
        $barangPembelian->save();
        }

        if($request->namaBarang2 != "Pilih" && $request->namaBarang2 != NULL){
            $idBarang2 = DB::table('barangs')->select('id')->where('namaBarang', $request->namaBarang2)->where('harga', $request->harga2)->first();
            $barangPembelian = new BarangPembelian;
            $barangPembelian->no_transaksi = $penjualanTunai->no_transaksi;
            $barangPembelian->barang_id = $idBarang2->id;
            $barangPembelian->kuantitas = $request->kuantitas2;
            $barangPembelian->save();
            }

        if($request->namaBarang3 != "Pilih" && $request->namaBarang3 != NULL){
            $idBarang3 = DB::table('barangs')->select('id')->where('namaBarang', $request->namaBarang3)->where('harga', $request->harga3)->first();
            $barangPembelian = new BarangPembelian;
            $barangPembelian->no_transaksi = $penjualanTunai->no_transaksi;
            $barangPembelian->barang_id = $idBarang3->id;
            $barangPembelian->kuantitas = $request->kuantitas3;
            $barangPembelian->save();
            }

        if($request->namaBarang4 != "Pilih" && $request->namaBarang4 != NULL){
            $idBarang4 = DB::table('barangs')->select('id')->where('namaBarang', $request->namaBarang4)->where('harga', $request->harga4)->first();
            $barangPembelian = new BarangPembelian;
            $barangPembelian->no_transaksi = $penjualanTunai->no_transaksi;
            $barangPembelian->barang_id = $idBarang4->id;
            $barangPembelian->kuantitas = $request->kuantitas4;
            $barangPembelian->save();
            }

        if($request->namaBarang5 != "Pilih" && $request->namaBarang5 != NULL){
            $idBarang5 = DB::table('barangs')->select('id')->where('namaBarang', $request->namaBarang5)->where('harga', $request->harga5)->first();
            $barangPembelian = new BarangPembelian;
            $barangPembelian->no_transaksi = $penjualanTunai->no_transaksi;
            $barangPembelian->barang_id = $idBarang5->id;
            $barangPembelian->kuantitas = $request->kuantitas5;
            $barangPembelian->save();
            }
        return redirect('/penjualan');
    }
    public function storeKredit(Request $request)
    {
        $petugas = Auth::user();
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
        $penjualanKredit->total = $request->totalPembelian;
        $penjualanKredit->tanggal = $request->tanggal;
        $penjualanKredit->deadline = $request->deadline;
        $numpadded = sprintf("%05d", getNextId('penjualan_kredits'));
        $prefix = "KR";
        $penjualanKredit->no_transaksi = $prefix.$numpadded;
        $penjualanKredit->status = 0;
        $penjualanKredit->petugas = $petugas->name;
        $penjualanKredit->save();

        if($request->namaBarang1 != "Pilih"){
            $idBarang1 = DB::table('barangs')->select('id')->where('namaBarang', $request->namaBarang1)->where('harga', $request->harga1)->first();
            $barangPembelian = new BarangPembelian;
            $barangPembelian->no_transaksi = $penjualanKredit->no_transaksi;
            $barangPembelian->barang_id = $idBarang1->id;
            $barangPembelian->kuantitas = $request->kuantitas1;
            $barangPembelian->save();
            }
    
        if($request->namaBarang2 != "Pilih" && $request->namaBarang2 != NULL){
            $idBarang2 = DB::table('barangs')->select('id')->where('namaBarang', $request->namaBarang2)->where('harga', $request->harga2)->first();
            $barangPembelian = new BarangPembelian;
            $barangPembelian->no_transaksi = $penjualanKredit->no_transaksi;
            $barangPembelian->barang_id = $idBarang2->id;
            $barangPembelian->kuantitas = $request->kuantitas2;
            $barangPembelian->save();
            }

        if($request->namaBarang3 != "Pilih" && $request->namaBarang3 != NULL){
            $idBarang3 = DB::table('barangs')->select('id')->where('namaBarang', $request->namaBarang3)->where('harga', $request->harga3)->first();
            $barangPembelian = new BarangPembelian;
            $barangPembelian->no_transaksi = $penjualanKredit->no_transaksi;
            $barangPembelian->barang_id = $idBarang3->id;
            $barangPembelian->kuantitas = $request->kuantitas3;
            $barangPembelian->save();
            }

        if($request->namaBarang4 != "Pilih" && $request->namaBarang4 != NULL){
            $idBarang4 = DB::table('barangs')->select('id')->where('namaBarang', $request->namaBarang4)->where('harga', $request->harga4)->first();
            $barangPembelian = new BarangPembelian;
            $barangPembelian->no_transaksi = $penjualanKredit->no_transaksi;
            $barangPembelian->barang_id = $idBarang4->id;
            $barangPembelian->kuantitas = $request->kuantitas4;
            $barangPembelian->save();
            }

        if($request->namaBarang5 != "Pilih" && $request->namaBarang5 != NULL){
            $idBarang5 = DB::table('barangs')->select('id')->where('namaBarang', $request->namaBarang5)->where('harga', $request->harga5)->first();
            $barangPembelian = new BarangPembelian;
            $barangPembelian->no_transaksi = $penjualanKredit->no_transaksi;
            $barangPembelian->barang_id = $idBarang5->id;
            $barangPembelian->kuantitas = $request->kuantitas5;
            $barangPembelian->save();
            }

        return redirect('/penjualan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showInvoice(Request $request)
    {
        $data = DB::table('penjualan_tunais')->where('no_transaksi', $request->id)
                ->join('data_diris','penjualan_tunais.user_id','=','data_diris.id')
                ->select('penjualan_tunais.*','data_diris.*')
                ->first();
        $barangPembelian = DB::table('penjualan_tunais')->where('penjualan_tunais.no_transaksi', $request->id)
                ->join('data_diris','penjualan_tunais.user_id','=','data_diris.id')
                ->join('barang_pembelians','penjualan_tunais.no_transaksi','=','barang_pembelians.no_transaksi')
                ->join('barangs','barang_pembelians.barang_id','=','barangs.id')
                ->select('penjualan_tunais.*','data_diris.*','barangs.*','barang_pembelians.*')
                ->get();
        if($data==NULL){
            return $this->showInvoiceKredit($request->id);
        }
        else{
            return view('penjualan.invoice', ['data' => $data, 'barangPembelian' => $barangPembelian]);
        }
    }

    public function showInvoiceKredit($id){
        $data = DB::table('penjualan_kredits')->where('no_transaksi', $id)
                ->join('data_diris','penjualan_kredits.user_id','=','data_diris.id')
                ->select('penjualan_kredits.*','data_diris.*')
                ->first();
        $barangPembelian = DB::table('penjualan_kredits')->where('penjualan_kredits.no_transaksi', $id)
                ->join('data_diris','penjualan_kredits.user_id','=','data_diris.id')
                ->join('barang_pembelians','penjualan_kredits.no_transaksi','=','barang_pembelians.no_transaksi')
                ->join('barangs','barang_pembelians.barang_id','=','barangs.id')
                ->select('penjualan_kredits.*','data_diris.*','barangs.*','barang_pembelians.*')
                ->get();
        return view('penjualan.invoice', ['data' => $data, 'barangPembelian' => $barangPembelian]);
    }

    public function checkout(Request $request){
        if(isset($request->deadline)){
            return view('penjualan.checkout.kredit', ['data' => $request]);
        }
        else{
            return view('penjualan.checkout.tunai', ['data' => $request]);
        }
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
