@extends('layouts.app')
@section('title','Penjualan - Kopma Unpad')
@section('content')
<div class="container">
    <h1>Input Barang</h1>
    <form method="POST" action="/checkout">
    @csrf
    @php($index=1)
    <div class="form-row">
        <div class="form-group col-7">
            <label for="namaBarang">Nama Barang</label>
            <select class="form-control" onchange="changeHarga(1)" name="" id="pilihBarang1">
                <option value="Pilih" selected>Pilih Barang</option>
                @foreach($barangs as $barang)
                    <option value="{{$barang->harga}}">{{$barang->namaBarang}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-1">
        <label for="kuantitas1">Kuantitas</label>
            <input required type="text" onchange="changeHarga(1)" class="form-control" id="kuantitas1" name="kuantitas1" value="">
        </div>
        <div class="form-group col-2">
        <label for="harga1">Harga Satuan (Rp.)</label>
            <input required type="text" class="form-control" id="harga1" name="harga1" readonly>
        </div>
        <div class="form-group col-2">
        <label for="harga1">Total (Rp.)</label>
            <input required type="text" class="form-control" id="totalharga1" name="totalharga1" readonly>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-7">
            <select class="form-control" onchange="changeHarga(2)" name="" id="pilihBarang2">
                <option value="Pilih" selected>Pilih Barang</option>
                @foreach($barangs as $barang)
                    <option value="{{$barang->harga}}">{{$barang->namaBarang}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-1">
            <input type="text" onchange="changeHarga(2)" class="form-control" id="kuantitas2" name="kuantitas2" value="">
        </div>
        <div class="form-group col-2">
            <input type="text" class="form-control" id="harga2" name="harga2" readonly>
        </div>
        <div class="form-group col-2">
            <input type="text" class="form-control" id="totalharga2" name="totalharga2" readonly>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-7">
            <select class="form-control" onchange="changeHarga(3)" name="" id="pilihBarang3">
                <option value="Pilih" selected>Pilih Barang</option>
                @foreach($barangs as $barang)
                    <option value="{{$barang->harga}}">{{$barang->namaBarang}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-1">
            <input type="text" onchange="changeHarga(3)" class="form-control" id="kuantitas3" name="kuantitas3" value="">
        </div>
        <div class="form-group col-2">
            <input type="text" class="form-control" id="harga3" name="harga3" readonly>
        </div>
        <div class="form-group col-2">
            <input type="text" class="form-control" id="totalharga3" name="totalharga3" readonly>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-7">
            <select class="form-control" onchange="changeHarga(4)" name="" id="pilihBarang4">
                <option value="Pilih" selected>Pilih Barang</option>
                @foreach($barangs as $barang)
                    <option value="{{$barang->harga}}">{{$barang->namaBarang}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-1">
            <input type="text" onchange="changeHarga(4)" class="form-control" id="kuantitas4" name="kuantitas4" value="">
        </div>
        <div class="form-group col-2">
            <input type="text" class="form-control" id="harga4" name="harga4" readonly>
        </div>
        <div class="form-group col-2">
            <input type="text" class="form-control" id="totalharga4" name="totalharga4" readonly>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-7">
            <select class="form-control" onchange="changeHarga(5)" name="" id="pilihBarang5">
                <option value="Pilih" selected>Pilih Barang</option>
                @foreach($barangs as $barang)
                    <option value="{{$barang->harga}}">{{$barang->namaBarang}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-1">
            <input type="text" onchange="changeHarga(5)" class="form-control" id="kuantitas5" name="kuantitas5" value="">
        </div>
        <div class="form-group col-2">
            <input type="text" class="form-control" id="harga5" name="harga5" readonly>
        </div>
        <div class="form-group col-2">
            <input type="text" class="form-control" id="totalharga5" name="totalharga5" readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="tanggal">Tanggal Transaksi</label>
        <input required type="date" class="form-control" id="tanggal" name="tanggal">
    </div>
    <div class="form-group">
        <label for="totalPembelian">Total Pembelian (Rp.)</label>
        <input required type="text" class="form-control" id="totalPembelian" name="totalPembelian" readonly>
    </div>
        <input type="text" id="namaBarang1" name="namaBarang1" hidden>
        <input type="text" id="namaBarang2" name="namaBarang2" hidden>
        <input type="text" id="namaBarang3" name="namaBarang3" hidden>
        <input type="text" id="namaBarang4" name="namaBarang4" hidden>
        <input type="text" id="namaBarang5" name="namaBarang5" hidden>
        <input type="text" id="nama" name="nama" value="{{$dataDiri->nama}}" hidden>
        <input type="text" id="noID" name="noID" value="{{$dataDiri->noID}}" hidden>
        <input type="text" id="email" name="email" value="{{$dataDiri->email}}" hidden>
        <input type="text" id="noHP" name="noHP" value="{{$dataDiri->noHP}}" hidden>
        <input type="text" id="alamat" name="alamat" value="{{$dataDiri->alamat}}" hidden>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    function changeHarga(i) {
    var harga = document.getElementById("pilihBarang"+i).value;
    document.getElementById("harga"+i).value = harga;
    changeTotal(harga, i);
    inputBarang(i);
}

function changeTotal(harga, i){
    var kuantitas = document.getElementById("kuantitas"+i).value;
    var total = harga * kuantitas;
    document.getElementById("totalharga"+i).value = total;

    var totalharga1 = document.getElementById("totalharga1").value;
    var totalharga2 = document.getElementById("totalharga2").value;
    var totalharga3 = document.getElementById("totalharga3").value;
    var totalharga4 = document.getElementById("totalharga4").value;
    var totalharga5 = document.getElementById("totalharga5").value;

    var totalSemua = Number(totalharga1) + Number(totalharga2) + Number(totalharga3) + Number(totalharga4) + Number(totalharga5);
    document.getElementById("totalPembelian").value = totalSemua;
}

function inputBarang(i){
    var namaBarang = document.getElementById("pilihBarang"+i);
    var text = namaBarang.options[namaBarang.selectedIndex].text;
    document.getElementById("namaBarang"+i).value = text;
}
</script>
@endsection

