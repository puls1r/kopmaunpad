<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PenjualanKredit;

class PembayaranController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        return view('pembayaran.index');
    }
    
    public function submitPembayaran(Request $request){
        $penjualanKredit = PenjualanKredit::where('no_transaksi', $request->no_transaksi)->first();
        $penjualanKredit->status = 1;
        $penjualanKredit->save();

        return redirect('/penjualan')->with('message', 'Pembayaran Selesai');
    }
}
