@extends('layouts.app')

@section('title','Dashboard - Kopma Unpad')
@section('content')
<div class="container">
    <h1>Submit Pembayaran</h1>
    <form action="/invoice">
        <div class="form-group">
            <label for="no_transaksi">Masukkan Nomor Transaksi</label>
            <input required class="form-control" type="text" id="no_transaksi" name="id">
            <input class="form-control" type="text" name="submit" value="yes" hidden>
        </div>
        <button type="submit" class="btn btn-primary">Bayar</button>
    </form>
</div>

@endsection