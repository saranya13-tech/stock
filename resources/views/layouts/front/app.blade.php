
 <!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/fav.png">
  <!-- Author Meta -->
  <meta name="author" content="CodePixar">
  <!-- Meta Description -->
  <meta name="description" content="">
  <!-- Meta Keyword -->
  <meta name="keywords" content="">
  <!-- meta character set -->
  <meta charset="UTF-8">
  <!-- Site Title -->
   <?php $company=DB::select('SELECT *  FROM company');
        foreach($company as $value){
            $com=$value->name;
            $logo=$value->logo;
        }?>
<title>{{ $com }}</title>
  <!--
    CSS
    ============================================= -->
  <link rel="stylesheet" href="{{  asset('karma/css/linearicons.css')}}">
  <link rel="stylesheet" href="{{  asset('karma/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{  asset('karma/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{  asset('karma/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{  asset('karma/css/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{  asset('karma/css/nice-select.css')}}">
  <link rel="stylesheet" href="{{  asset('karma/css/nouislider.min.css')}}">
  <link rel="stylesheet" href="{{  asset('karma/css/ion.rangeSlider.css')}}" />
  <link rel="stylesheet" href="{{  asset('karma/css/ion.rangeSlider.skinFlat.css')}}" />
  <link rel="stylesheet" href="{{  asset('karma/css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{  asset('karma/css/main.css')}}">
</head>

<body>
 
   
  <div class="wrapper">
    @include('layouts.front.header')

    @include('layouts.front.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      
      
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    @include('layouts.front.footer')

</div> 
    <script src="{{  asset('karma/js/vendor/jquery-2.2.4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
   crossorigin="anonymous"></script>
  <script src="{{  asset('karma/js/vendor/bootstrap.min.js')}}"></script>
  <script src="{{  asset('karma/js/jquery.ajaxchimp.min.js')}}"></script>
  <script src="{{  asset('karma/js/jquery.nice-select.min.js')}}"></script>
  <script src="{{  asset('karma/js/jquery.sticky.js')}}"></script>
  <script src="{{  asset('karma/js/nouislider.min.js')}}"></script>
  <script src="{{  asset('karma/js/countdown.js')}}"></script>
  <script src="{{  asset('karma/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{  asset('karma/js/owl.carousel.min.js')}}"></script>
  <!--gmaps Js-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
  <script src="{{  asset('karma/js/gmaps.min.js')}}"></script>
  <script src="{{  asset('karma/js/main.js')}}"></script>
</body>

</html>