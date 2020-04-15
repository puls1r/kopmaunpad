<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Invoice {{$data->no_transaksi}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="{{asset('SimpleInvoice/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('SimpleInvoice/font-awesome/css/font-awesome.min.css')}}" />

    <script type="text/javascript" src="{{asset('SimpleInvoice/js/jquery-1.10.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('SimpleInvoice/bootstrap/js/bootstrap.min.js')}}"></script>
</head>
<body>

<div class="container" style="padding-bottom:30px">
    <div class="row">
        <div class="col-xs-12">
            <div class="text-center">
                <h2>Nota Pembelian #{{$data->no_transaksi}}</h2>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-md-3 col-lg-3 pull-left">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Billing Details</div>
                        <div class="panel-body">
                            <strong>{{$data->nama}}:</strong><br>
                            {{$data->alamat}}<br>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Payment Information</div>
                        <div class="panel-body">
                            <strong>Tanggal Transaksi:</strong> {{date('j F, Y', strtotime($data->tanggal))}}<br>
                            <strong>Tanggal Jatuh Tempo: </strong> 
                            @isset($data->deadline)
                            {{date('j F, Y', strtotime($data->deadline))}}
                            @else
                            <b>-</b>
                            @endisset
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Payment Status</div>
                        <div class="panel-body">
                            <strong>Status Pembayaran:</strong> 
                            @isset($data->deadline)
                                @if($data->status == 0)
                                Belum Lunas<br>
                                @else
                                Lunas<br>
                                @endif
                            @else
                                Lunas
                                <br>
                            @endisset
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3 pull-right">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Petugas</div>
                        <div class="panel-body">
                            <strong>Nama: </strong>{{$data->petugas}}<br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Item Name</strong></td>
                                    <td class="text-center"><strong>Item Price</strong></td>
                                    <td class="text-center"><strong>Item Quantity</strong></td>
                                    <td class="text-right"><strong>Total</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($barangPembelian as $barang)
                                <tr>
                                    <td>{{$barang->namaBarang}}</td>
                                    <td class="text-center">Rp. {{number_format($barang->harga,2,',','.')}}</td>
                                    <td class="text-center">{{$barang->kuantitas}}</td>
                                    <td class="text-right">Rp. {{number_format($barang->harga * $barang->kuantitas,2,',','.')}}</td>
                                @endforeach
                                </tr>
                                    <td class="highrow"></td>
                                    <td class="highrow"></td>
                                    <td class="highrow text-center"><strong>Total</strong></td>
                                    <td class="highrow text-right">Rp.{{number_format($data->total,2,',','.')}}</td>
                                </tr>                                
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
                        @if(Request::get('submit')=='yes')
                        <div style="display:inline-block;">
                        <button class="btn btn-success" form="submitForm">Bayar</button>
                        <form id="submitForm" action="/submitPembayaran" method="post">
                        @csrf
                            <input type="text" name="no_transaksi" value="{{$data->no_transaksi}}" hidden>
                        </form>
                        @endif
                        </div>
                        <div style="display:inline-block">
                        @if($data->total >= 200000 && isset($data->deadline))
                        <a class="btn btn-primary" href="/suratPerjanjian/{{$data->no_transaksi}}">Surat Perjanjian</a>
                        @endif
                        </div>
                        <div style="display:inline-block">
                        @isset($data->status)
                            @if($data->status == 0)
                        <a class="btn btn-primary" href="/invoicePrint/{{$data->no_transaksi}}">Invoice</a>
                        @else
                        <a class="btn btn-primary" href="/buktiTransaksi/{{$data->no_transaksi}}">Bukti Transaksi</a>
                        @endif
                        @endisset
                        </div>
                        <div style="display:inline-block">
                        @if(!isset($data->deadline))
                        <a class="btn btn-primary" href="/suratPerjanjian/{{$data->no_transaksi}}">Bukti Transaksi</a>
                        @endif
                    
                        </div>
        </div>
</div>

<style>
.height {
    min-height: 200px;
}

.icon {
    font-size: 47px;
    color: #5CB85C;
}

.iconbig {
    font-size: 77px;
    color: #5CB85C;
}

.table > tbody > tr > .emptyrow {
    border-top: none;
}

.table > thead > tr > .emptyrow {
    border-bottom: none;
}

.table > tbody > tr > .highrow {
    border-top: 3px solid;
}
</style>

<!-- Simple Invoice - END -->

</body>
</html>