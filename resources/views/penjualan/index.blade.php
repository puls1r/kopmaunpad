@extends('layouts.app')

@section('title', 'Penjualan - Kopma Unpad')
@section('content')
<div class="container">
    <div class="row justify-content-between">
        <div class="col-4"><p style="padding:0;margin:0;font-size:30px;color:black;font-weight:bold">Penjualan</p></div>
        <div class="col-4 align-self-end"><a href="/penjualan/input" class="btn btn-primary mb-2 float-right">Tambah Penjualan</a></div>
    </div>
    <ul class="nav nav-tabs nav-fill">
        <li><a style="font-weight:bold" class="nav-item nav-link active"data-toggle="tab" href="#tunai">Tunai</a></li>
        <li><a style="font-weight:bold" class="nav-item nav-link" data-toggle="tab" href="#kredit">Kredit</a></li>
     </ul>
    <div class="tab-content">
        <div id="tunai" class="tab-pane fade show active">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">No. Transaksi</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Total</th>
                    <th scope="col">Kwitansi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($dataTunai as $data)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$data->no_transaksi}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->tanggal}}</td>
                    <td>Rp. {{$data->total}}</td>
                    <td><button form="invoiceTunai{{$loop->iteration}}" type="submit" class="btn btn-primary">Lihat</button></td>
                    </tr>
                    <form action="/invoice" method="GET" id="invoiceTunai{{$loop->iteration}}">
                        <input type="text" name="id" value="{{$data->no_transaksi}}" hidden>
                    </form>
                @endforeach
                </tbody>
            </table>
        </div>
        <div id="kredit" class="tab-pane fade">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">No. Transaksi</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Status Pembayaran</th>
                    <th scope="col">Kwitansi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($dataKredit as $data)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$data->no_transaksi}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->tanggal}}</td>
                    <td>{{$data->deadline}}</td>
                    <td>@if($data->status == 1)Lunas
                        @else
                        Belum Lunas
                        @endif
                    </td>
                    <td><button form="invoice{{$loop->iteration}}" type="submit" class="btn btn-primary">Lihat</button></td>
                    </tr>
                    <form action="/invoice" method="GET" id="invoice{{$loop->iteration}}">
                        <input type="text" name="id" value="{{$data->no_transaksi}}" hidden>
                    </form>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection