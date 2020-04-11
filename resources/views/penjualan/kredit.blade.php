@extends('layouts.app')
@section('title','Penjualan - Kopma Unpad')
@section('content')
<div class="container">
    <h1>Input Barang</h1>
    <form method="POST" action="/saveKredit">
    @csrf
    <div class="form-row">
        <div class="col">
            <label for="namaBarang">Nama Barang</label>
            <select onchange="changeHarga()" name="" id="pilihBarang">
                <option value="Pilih" selected>Pilih Barang</option>
                @foreach($barangs as $barang)
                    <option value="{{$barang->harga}}">{{$barang->namaBarang}}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label for="harga">Harga Barang</label>
            <input required type="text" class="form-control" id="harga" name="harga" readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="kuantitas">Kuantitas Barang</label>
        <input onchange="changeHarga()" required type="text" class="form-control" id="kuantitas" name="kuantitas">
    </div>
    <div class="form-group">
        <label for="alamat_pengiriman">Alamat Pengiriman</label>
        <input required type="text" class="form-control" id="alamat_pengiriman" name="alamat_pengiriman">
    </div>
    <div class="form-group">
        <label for="tanggal">Tanggal Transaksi</label>
        <input required type="date" class="form-control" id="tanggal" name="tanggal">
    </div>
    <div class="form-group">
        <label for="deadline">Tanggal Jatuh Tempo</label>
        <input required type="date" class="form-control" id="deadline" name="deadline">
    </div>
    <div class="form-group">
        <label for="total">Total</label>
        <input required type="text" class="form-control" id="total" name="total" readonly>
    </div>
        <!-- form untuk data diri -->
        <input type="text" id="namaBarang" name="namaBarang" hidden>
        <input type="text" id="nama" name="nama" value="{{$dataDiri->nama}}" hidden>
        <input type="text" id="noID" name="noID" value="{{$dataDiri->noID}}" hidden>
        <input type="text" id="email" name="email" value="{{$dataDiri->email}}" hidden>
        <input type="text" id="noHP" name="noHP" value="{{$dataDiri->noHP}}" hidden>
        <input type="text" id="alamat" name="alamat" value="{{$dataDiri->alamat}}" hidden>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    function changeHarga() {
    var harga = document.getElementById("pilihBarang").value;
    document.getElementById("harga").value = harga;
    changeTotal(harga);
    inputBarang();
}

function changeTotal(harga){
    var kuantitas = document.getElementById("kuantitas").value;
    var total = harga * kuantitas;
    document.getElementById("total").value = total;
}

function inputBarang(){
    var namaBarang = document.getElementById("pilihBarang");
    var text = namaBarang.options[namaBarang.selectedIndex].text;
    document.getElementById("namaBarang").value = text;
}
</script>
@endsection

