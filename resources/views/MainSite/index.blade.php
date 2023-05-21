<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GetPet | All about pets</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('Theme/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('Theme/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('Theme/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('Theme/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('Theme/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('Theme/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('Theme/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('Theme/css/style.css') }}" type="text/css">
</head>

<body>
    @include('MainSite.Layouts.nav')
    @yield('content')
    @include('MainSite.Layouts.footer')
    
    {{-- welcome modal --}}
    <div class="modal fade d-flex align-items-center" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center">Welcome to getpet.in</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h4>GetPet.in is under construction so please bear with us!</h4>
              <p>For custom orders or queries, please email us <a href="mailto:info@getpet.in">info@getpet.in</a></p>
            </div>
          </div>
        </div>
      </div>
    <!-- Js Plugins -->
    <script src="{{ asset('Theme/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('Theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Theme/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('Theme/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('Theme/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('Theme/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('Theme/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('Theme/js/main.js') }}"></script>
    <script src="{{ asset('Custom/main.js') }}"></script>
</body>

</html>
