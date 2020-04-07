@extends('layouts.app')

@section('title', 'Penjualan - Kopma Unpad')
@section('content')
<div class="container">
    <div class="row justify-content-between">
        <div class="col-4"><p style="padding:0;margin:0;font-size:30px;color:black;font-weight:bold">Penjualan</p></div>
        <div class="col-4 align-self-end"><a href="/penjualan/input" class="btn btn-primary mb-2 float-right">Tambah Penjualan</a></div>
    </div>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">No.</th>
        <th scope="col">No. Transaksi</th>
        <th scope="col">Nama Pembeli</th>
        <th scope="col">Tanggal Transaksi</th>
        <th scope="col">Kwitansi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>@mdo</td>
        </tr>
        <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        <td>@fat</td>
        </tr>
        <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
        <td>@twitter</td>
        </tr>
    </tbody>
    </table>
</div>
@endsection