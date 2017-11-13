<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>laramap</title>
    </meta>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></link>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />

</head>
<body>

  @yield('content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


  {{--google map api--}}
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClrffdjrdDDHn64hxXC18yZDijl90mzTE&libraries=places"></script>



<script src="{{asset('js/script.js')}}"></script>
  <script src="{{asset('js/ajaxsearch.js')}}"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
@yield('js')
</body>
</html>