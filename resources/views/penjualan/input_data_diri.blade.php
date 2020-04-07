@extends('layouts.app')
@section('title','Penjualan - Kopma Unpad')
@section('content')
<div class="container">
    <h1>Data Pembeli</h1>
    <form method="POST" action="">
    <div class="form-group">
        <label for="nama">Nama Pembeli</label>
        <input required type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
    </div>
    <div class="form-group">
        <label for="nomorID">Nomor Identitas</label>
        <input required type="text" class="form-control" id="nomorID" name="nomorID" placeholder="Masukkan Nomor Identitas">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input required type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
    </div>
    <div class="form-group">
        <label for="noHP">Nomor Handphone</label>
        <input required type="text" class="form-control" id="noHP" name="noHP" placeholder="Masukkan No. Handphone">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input required type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
    </div>
    <div class="form-group "> 
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" value="tunai" id="tunai" name="tipePenjualan" checked>
        <label class="custom-control-label" for="tunai">Tunai</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" value="kredit" id="kredit" name="tipePenjualan">
        <label class="custom-control-label" for="kredit">Kredit</label>
    </div>
    </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection