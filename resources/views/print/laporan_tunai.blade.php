<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <title>Laporan Tunai</title>
</head>
<body>
    <center>
    <h4>Koperasi Mahasiswa Universitas Padjadjaran<br>
        Laporan Penjualan Tunai
        </h4>
    </center>

    <table class="table table-bordered">
        <tr>
            <th scope="col">No.</th>
            <th scope="col">No. Transaksi</th>
            <th scope="col">Nama Pembeli</th>
            <th scope="col">Tanggal Transaksi</th>
            <th scope="col">Total</th>
            <th scope="col">Petugas</th>
        </tr>
        @foreach($dataTunai->sortByDesc('tanggal') as $data)
        <tr>
        <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$data->no_transaksi}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{date('j F, Y', strtotime($data->tanggal))}}</td>
                    <td>Rp. {{number_format($data->total,2,',','.')}}</td>
                    <td>{{$data->petugas}}</td>
                    </tr>
        @endforeach
   </table>
</body>
</html>