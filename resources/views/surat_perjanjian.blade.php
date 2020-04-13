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
        Surat Perjanjian</h4>
   </center>
   <p>Yang bertanda tangan di bawah ini :</p>
   <table>
        <tr>
            <td>Nama </td>
            <td>:</td>
            <td>{{$data->nama}}</td>
        </tr>
        <tr>
            <td>Nomor Identitas </td>
            <td>:</td>
            <td>{{$data->noID}}</td>
        </tr>
        <tr>
            <td>Alamat </td>
            <td>:</td>
            <td>{{$data->alamat}}</td>
        </tr>
        <tr>
            <td>Nomor Handphone </td>
            <td>:</td>
            <td>{{$data->noHP}}</td>
        </tr>
        <tr>
            <td>Email </td>
            <td>:</td>
            <td>{{$data->email}}</td>
        </tr>
   </table>
   <p>Selanjutnya nama tersebut diatas akan disebut sebagai Pihak I (pertama)</p>
   <p>Telah mengadakan jual beli dengan :</p>
   <table>
        <tr>
            <td>Nama </td>
            <td>:</td>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <td>Jabatan </td>
            <td>:</td>
            <td>Staff Usaha KOPMA Unpad</td>
        </tr>
        <tr>
            <td>Alamat </td>
            <td>:</td>
            <td>Pedca Timur, dekat kantor Kas Bank BRI depan Bale wilasa 6</td>
        </tr>
        <tr>
            <td>Nomor Handphone </td>
            <td>:</td>
            <td>{{$user->noHP}}</td>
        </tr>
   </table>
   <p>Selanjutnya nama tersebut diatas akan disebut sebagai Pihak II (kedua)</p>
   <p>Dengan ini Menyatakan bahwa Pihak I melakukan pembelian berupa :</p>
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
            <td>{{$barang->harga}}</td>
            <td>{{$barang->harga * $barang->kuantitas}}</td>
        </tr>
        @endforeach
   </table>
   <p>Pihak I (Pertama) berjanji akan melakukan pembayaran pada tanggal {{$data->deadline}} kepada Pihak II (kedua) dan jika perjanjian dilanggar maka akan diberlakukan denda Rp50,000/hari dan akan diakumuluasikan dengan jumlah piutang yang dimiliki oleh Pihak I (Pertama). </p>
    <table class="table table-borderless">
        <tr>
            <td>Pihak pertama</td>
            <td>Pihak Kedua</td>
        </tr>
        <tr>
            <td>Materai 6000</td>
            <td> </td>
        </tr>
        <tr>
            <td>{{$data->nama}}</td>
            <td>{{$user->name}}</td>
        </tr>
    </table>
</body>

</html>