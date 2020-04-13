<!DOCTYPE html>
<html>
<head>
  <title>Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/payment.css')}}">
</head>
<body>
  <main class="page payment-page">
    <section class="payment-form dark">
      <div class="container">
        <div class="block-heading">
          <h2>Payment</h2>
        </div>
        <form id="savePembelian" method="POST" action="/saveKredit">
        @csrf
          <div class="products">
            <h3 class="title">Checkout</h3>
            <div class="item">
              <span class="price">{{$data->totalharga1}}</span>
              <p class="item-name">{{$data->namaBarang1}}</p>
              <p class="item-description">{{$data->harga1}} X {{$data->kuantitas1}}</p>
            </div>
            @if($data->namaBarang2)
            <div class="item">
              <span class="price">{{$data->totalharga2}}</span>
              <p class="item-name">{{$data->namaBarang2}}</p>
              <p class="item-description">{{$data->harga2}} X {{$data->kuantitas2}}</p>
            </div>
            @endif
            @if($data->namaBarang3)
            <div class="item">
              <span class="price">{{$data->totalharga3}}</span>
              <p class="item-name">{{$data->namaBarang3}}</p>
              <p class="item-description">{{$data->harga3}} X {{$data->kuantitas3}}</p>
            </div>
            @endif
            @if($data->namaBarang4)
            <div class="item">
              <span class="price">{{$data->totalharga4}}</span>
              <p class="item-name">{{$data->namaBarang4}}</p>
              <p class="item-description">{{$data->harga4}} X {{$data->kuantitas4}}</p>
            </div>
            @endif
            @if($data->namaBarang5)
            <div class="item">
              <span class="price">{{$data->totalharga5}}</span>
              <p class="item-name">{{$data->namaBarang5}}</p>
              <p class="item-description">{{$data->harga5}} X {{$data->kuantitas5}}</p>
            </div>
            @endif
            <div class="total">Total<span class="price">{{$data->totalPembelian}}</span></div>
          </div>
          <div class="card-details">
            <h3 class="title">Billing Details</h3>
            <p><b>Nama Pembeli :</b> {{$data->nama}}</p>
            <p><b>Alamat :</b> {{$data->alamat}}</p>
            <p><b>No HP :</b> {{$data->noHP}}</p>
            <p><b>Email :</b> {{$data->email}}</p>
            <p><b>Alamat Pengiriman :</b> {{$data->alamat_pengiriman}}</p>
            <p><b>Tanggal Jatuh Tempo :</b> {{$data->deadline}}</p>
              <div class="row">
              <div class="form-group col-12">
                  <button type="button" class="btn btn-primary btn-block" onclick="javascript:window.location.href='/penjualan';">Surat Perjanjian</button>
              </div>
              </div>
              <div class="row">
              <div class="form-group col-6">
                  <button type="button" class="btn btn-danger btn-block" onclick="javascript:window.location.href='/penjualan';">Cancel</button>
              </div>
              <div class="form-group col-6">
                  <button class="btn btn-success btn-block" type="submit">Proceed</button>
              </div>
              </div>
              <!-- hidden form untuk data -->
                <input type="text" name="nama" value="{{$data->nama}}" hidden>
                <input type="text" name="noID" value="{{$data->noID}}" hidden>
                <input type="text" name="alamat" value="{{$data->alamat}}" hidden>
                <input type="text" name="noHP" value="{{$data->noHP}}" hidden>
                <input type="text" name="email" value="{{$data->email}}" hidden>
                <input type="text" name="totalPembelian" value="{{$data->totalPembelian}}" hidden>
                <input type="text" name="tanggal" value="{{$data->tanggal}}" hidden>
                <input type="text" name="deadline" value="{{$data->deadline}}" hidden>
                <input type="text" name="alamat_pengiriman" value="{{$data->alamat_pengiriman}}" hidden>
                <input type="text" name="namaBarang1" value="{{$data->namaBarang1}}" hidden>
                <input type="text" name="namaBarang2" value="{{$data->namaBarang2}}" hidden>
                <input type="text" name="namaBarang3" value="{{$data->namaBarang3}}" hidden>
                <input type="text" name="namaBarang4" value="{{$data->namaBarang4}}" hidden>
                <input type="text" name="namaBarang5" value="{{$data->namaBarang5}}" hidden>
                <input type="text" name="kuantitas1" value="{{$data->kuantitas1}}" hidden>
                <input type="text" name="kuantitas2" value="{{$data->kuantitas2}}" hidden>
                <input type="text" name="kuantitas3" value="{{$data->kuantitas3}}" hidden>
                <input type="text" name="kuantitas4" value="{{$data->kuantitas4}}" hidden>
                <input type="text" name="kuantitas5" value="{{$data->kuantitas5}}" hidden>
                <input type="text" name="harga1" value="{{$data->harga1}}" hidden>
                <input type="text" name="harga2" value="{{$data->harga2}}" hidden>
                <input type="text" name="harga3" value="{{$data->harga3}}" hidden>
                <input type="text" name="harga4" value="{{$data->harga4}}" hidden>
                <input type="text" name="harga5" value="{{$data->harga5}}" hidden>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>