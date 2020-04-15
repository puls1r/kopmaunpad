<!doctype html>
<html lang="en">
  <head>
  	<title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/jpg" href="{{asset('images/favicon.jpg')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('sidebarAsset/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/inputForm.css')}}">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4">
		  		<h1><a href="/" class="logo">Kopma Unpad</a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="{{ (request()->is('/')) ? 'active' : '' }}">
	            <a href="/"><span class=" mr-3"></span>Manual</a>
	          </li>
	          <li class="{{ (request()->is('penjualan*')) ? 'active' : '' }}">
	              <a href="/penjualan"><span class=" mr-3"></span>Penjualan</a>
	          </li>
	          <li class="{{ (request()->is('pembayaran*')) ? 'active' : '' }}">
              <a href="/pembayaran"><span class=" mr-3"></span>Pembayaran</a>
	          </li>
	          <li class="{{ (request()->is('listBarang*')) ? 'active' : '' }}">
              <a href="/listBarang"><span class=" mr-3"></span>Data Barang</a>
            </li>
            <li>
              <a href="{{route('logout')}}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              <span class=" mr-3"></span>Logout</a>  
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>  
            </li>
	        </ul>
	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
      @yield('content')  
      </div>
		</div>

    <script src="{{asset('sidebarAsset/js/jquery.min.js')}}"></script>
    <script src="{{asset('sidebarAsset/js/popper.js')}}"></script>
    <script src="{{asset('sidebarAsset/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('sidebarAsset/js/main.js')}}"></script>
    
  </body>
</html>