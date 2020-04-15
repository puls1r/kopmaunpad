@extends('layouts.app')

@section('title', 'Penjualan - Kopma Unpad')
@section('content')
<div class="container">
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
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
            <a href="/cetakTunai" class="btn btn-primary">Cetak Laporan Tunai</a>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">No. Transaksi</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Total</th>
                    <th scope="col">Petugas</th>
                    <th scope="col">Kelengkapan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($dataTunai->sortByDesc('tanggal') as $data)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$data->no_transaksi}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{date('j F, Y', strtotime($data->tanggal))}}</td>
                    <td>Rp. {{number_format($data->total,2,',','.')}}</td>
                    <td>{{$data->petugas}}</td>
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
        <a href="/cetakKredit" class="btn btn-primary">Cetak Laporan Kredit</a>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">No. Transaksi</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Jatuh Tempo</th>
                    <th scope="col">Total</th>
                    <th scope="col">Petugas</th>
                    <th scope="col">Status Pembayaran</th>
                    <th scope="col">Kelengkapan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($dataKredit->sortByDesc('tanggal') as $data)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$data->no_transaksi}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{date('j F, Y', strtotime($data->tanggal))}}</td>
                    <td>{{date('j F, Y', strtotime($data->deadline))}}</td>
                    <td>Rp. {{number_format($data->total,2,',','.')}}</td>
                    <td>{{$data->petugas}}</td>
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