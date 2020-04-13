@extends('layouts.app')

@section('title','Dashboard - Kopma Unpad')
@section('content')
<div class="container">
<div class="row justify-content-between">
        <div class="col-4"><p style="padding:0;margin:0;font-size:30px;color:black;font-weight:bold">Data Barang</p></div>
        <div class="col-4 align-self-end"><a href="/listBarang/input" class="btn btn-primary mb-2 float-right">Tambah Barang</a></div>
</div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Harga</th>
    </tr>
  </thead>
  <tbody>
      @foreach($barangs as $barang)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$barang->namaBarang}}</td>
      <td>{{$barang->harga}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

@endsection