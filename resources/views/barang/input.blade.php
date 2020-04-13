@extends('layouts.app')
@section('title','Penjualan - Kopma Unpad')
@section('content')
<div class="container">
    <h1>Data Pembeli</h1>
    <form method="POST" action="">
    @csrf
    <div class="form-group">
        <label for="namaBarang">Nama Barang</label>
        <input required type="text" class="form-control" id="namaBarang" name="namaBarang" placeholder="Masukkan Nama">
    </div>
    <div class="form-group">
        <label for="harga">Harga</label>
        <input required type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan Nomor Identitas">
    </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection