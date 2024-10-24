<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>


  <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">

  <link rel="stylesheet" href="{{asset('assets/modules/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/datatables/Datatables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/izitoast/css/iziToast.min.css')}}">
  <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css')}}">



  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1"> 
      <div class="navbar-bg"></div>

      @include('layout.navbar')
      
      @include('layout.sidebar')

      <!-- Main Content -->
      @yield('content')

      <p class="text lead">ANJAYYY</p>

     
      @include('layout.footer')

    </div>
  </div>



  <script src="{{asset('assets/modules/jquery.min.js')}}"></script>

  <script src="{{asset('assets/modules/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('assets/modules/datatables/Datatables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>
  <script src="{{asset('assets/modules/sweetalert/sweetalert.min.js')}}"></script>

  <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  @if (session('sukses'))
    <script>
      iziToast.success({
        title: 'Berhasil',
        message: '{{ session('sukses') }}',
        position: 'bottomRight'
      })
    </script>
    
  @endif

@stack('script')
</body>
</html>