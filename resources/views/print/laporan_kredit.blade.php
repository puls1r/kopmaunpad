<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <title>Laporan Kredit</title>
</head>
<body>
    <center>
    <h5>Koperasi Mahasiswa Universitas Padjadjaran<br>
        Laporan Penjualan Kredit
        </h5>
    </center>

    <table style="font-size:12px" class="table table-bordered">
        <tr>
        <th scope="col">No.</th>
        <th scope="col">No. Transaksi</th>
        <th scope="col">Nama Pembeli</th>
        <th scope="col">Tanggal Transaksi</th>
        <th scope="col">Jatuh Tempo</th>
        <th scope="col">Total</th>
        <th scope="col">Petugas</th>
        <th scope="col">Status Pembayaran</th>
        </tr>

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
            </tr>
        @endforeach
   </table>
</body>
</html>