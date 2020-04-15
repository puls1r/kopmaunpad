<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PrintPDF extends Controller
{
    public function SuratPerjanjian($id){
        // This  $data array will be passed to our PDF blade
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
        $user = Auth::user();
      $pdf = \PDF::loadView('print.surat_perjanjian', ['data' => $data, 'barangPembelian' => $barangPembelian, 'user' => $user]);  
      return $pdf->download('perjanjian.pdf');
    }

    public function invoice($id){
        // This  $data array will be passed to our PDF blade
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
        $user = Auth::user();
      $pdf = \PDF::loadView('print.invoice', ['data' => $data, 'barangPembelian' => $barangPembelian, 'user' => $user]);  
      return $pdf->download('invoice.pdf');
    }

    public function buktiTransaksi($id){
        // This  $data array will be passed to our PDF blade
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
        $user = Auth::user();
      $pdf = \PDF::loadView('print.bukti_transaksi', ['data' => $data, 'barangPembelian' => $barangPembelian, 'user' => $user]);  
      return $pdf->download('bukti_transaksi.pdf');
    }

    public function cetakTunai(){
        // This  $data array will be passed to our PDF blade
        $data = DB::table('penjualan_tunais')
                    ->join('data_diris','penjualan_tunais.user_id','=','data_diris.id')
                    ->select('penjualan_tunais.*','data_diris.nama')
                    ->get();
      $pdf = \PDF::loadView('print.laporan_tunai', ['dataTunai' => $data]);  
      return $pdf->download('laporan_tunai.pdf');
    }

    public function cetakKredit(){
        // This  $data array will be passed to our PDF blade
        $data = DB::table('penjualan_kredits')
                    ->join('data_diris','penjualan_kredits.user_id','=','data_diris.id')
                    ->select('penjualan_kredits.*','data_diris.nama')
                    ->get();
      $pdf = \PDF::loadView('print.laporan_kredit', ['dataKredit' => $data]);  
      return $pdf->download('laporan_kredit.pdf');
    }
}
