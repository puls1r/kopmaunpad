<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <title>Document</title>
</head>
<body style="font-family: 'Times New Roman', Times, serif;">
    <center>
        <h4><strong>Koperasi Mahasiswa Universitas Padjadjaran</strong><br>
        Invoice</h4>
   </center>
   <p>Telah diterima pelunasan barang oleh : </p><br>
   <table>
        <tr>
            <td><strong>Nama Pembeli </strong></td>
            <td>:</td>
            <td> {{$data->nama}}</td>
        </tr>
        <tr>
            <td><strong>Tanggal Transaksi </strong></td>
            <td>:</td>
            <td> {{date('j F, Y', strtotime($data->tanggal))}}</td>
        </tr>
        <tr>
            <td><strong>Nomor Transaksi </strong></td>
            <td>:</td>
            <td> {{$data->no_transaksi}}</td>
        </tr>
   </table>
   <br>
   <p>Dengan rincian barang sebagai berikut :</p>
   <table class="table table-bordered">
        <tr>
           <th scope="col">No</th>
           <th scope="col">Nama Barang</th>
           <th scope="col">Jumlah Barang</th>
           <th scope="col">Harga</th>
           <th scope="col">Total Pembelian</th>
        </tr>
        @foreach($barangPembelian as $barang)
        <tr>
            <td scope="row">{{$loop->iteration}}</td>
            <td>{{$barang->namaBarang}}</td>
            <td>{{$barang->kuantitas}}</td>
            <td>Rp. {{number_format($barang->harga,2,',','.')}}</td>
            <td>Rp. {{number_format($barang->harga * $barang->kuantitas,2,',','.')}}</td>
        </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Total</td>
            <td>Rp. {{number_format($barang->total,2,',','.')}}</td>
        </tr>
   </table>
   <table class="table table-borderless">
        <tr>
            <td>Pembeli</td>
            <td>Petugas KOPMA Unpad</td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
        </tr>
        <tr>
            <td>{{$data->nama}}</td>
            <td>{{$user->name}}</td>
        </tr>
    </table>
</body>

</html>