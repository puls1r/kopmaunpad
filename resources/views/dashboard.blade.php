@extends('layouts.app')

@section('title','Dashboard - Kopma Unpad')
@section('content')
<div class="container" style="max-width:70em;margin-left:50px">
    <h2 style="font-weight:bold">Selamat Datang di <br>Sistem Pendataan Kopma Unpad</h2>

    <h3 style="font-weight:bold"><span style="color: purple">#</span> Introduction</h3>
    <h6 style="margin-bottom:25px;color: black; line-height: 1.8rem">Sistem Pendataan Kopma Unpad merupakan web application yang berfungsi untuk mendata kegiatan penjualan di <span style="color:purple;font-weight:bold">Koperasi Mahasiswa Universitas Padjadjaran</span></h6>

    <h3 style="font-weight:bold"><span style="color: purple">#</span> Features</h3>
        <h4 style="font-weight:bold;"><span style="color:purple">1.</span> Penjualan</h4>
        <h6 style="margin-bottom:25px; color:black;line-height: 1.8rem">Sistem Pendataan Kopma Unpad dapat mendata penjualan tunai dan kredit yang dilakukan oleh Kopma Unpad, seperti nama pembeli, tanggal transaksi, jatuh tempo transaksi, total pembelian, dsb. yang disajikan dalam bentuk table yang tersusun rapih.</h6>
        
        <h4 style="font-weight:bold;"><span style="color:purple">2.</span> Pembayaran</h4>
        <h6 style="margin-bottom:25px; color:black;line-height: 1.8rem">Sistem memiliki fitur untuk men-submit pembayaran transaksi kredit berdasarkan nomor transaksi nya.</h6>
        
        <h4 style="font-weight:bold;"><span style="color:purple">3.</span> Persuratan</h4>
        <h6 style="margin-bottom:25px; color:black;line-height: 1.8rem">Sistem dapat mencetak dokumen seperti surat perjanjian untuk pembelian kredit, invoice, bukti pembayaran, serta laporan penjualan yang dicetak secara otomatis.</h6>
        
        <h4 style="font-weight:bold;"><span style="color:purple">4.</span> Data Barang</h4>
        <h6 style="margin-bottom:25px; color:black;line-height: 1.8rem">Sistem dapat mendata barang jualan yang ada di Kopma Unpad.</h6>
        
        <h4 style="font-weight:bold;"><span style="color:purple">5.</span> Akun Petugas Kopma Unpad</h4>
        <h6 style="margin-bottom:25px; color:black;line-height: 1.8rem">Sistem hanya dapat digunakan oleh petugas yang memiliki akun, sehingga menjaga integritas data yang ada.</h6>
        
    <h3 style="font-weight:bold"><span style="color: purple">#</span> Signature</h3>
    <h6 style="margin-bottom:25px;color: black; line-height: 1.8rem">Application by Karina, Adisti, and Dhila</h6>

</div>

@endsection