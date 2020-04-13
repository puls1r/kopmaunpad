<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class BarangController extends Controller
{
    public function index(){
        $barangs = Barang::all();
        return view('barang.index', ['barangs' => $barangs]);
    }

    public function input(){
        return view('barang.input');
    }
    
    public function store(Request $request){
        $barang = new Barang;
        $barang->namaBarang = $request->namaBarang;
        $barang->harga = $request->harga;
        $barang->save();

        return redirect('/listBarang');
    }
}
