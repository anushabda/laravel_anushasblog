<!DOCTYPE html>
<html lang="en">

<head>
@include('user/layouts/head')

</head>

<body style="background-color:LightSalmon">
  <!-- Navigation -->
  @include('user/layouts/header')

  <!-- Page Content -->

@section('main-content')
@show

  <!-- Footer -->

  @include('user/layouts/footer')
    <!-- /.container -->

  <!-- Bootstrap core JavaScript
  <script src="{{ asset('user/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
-->




</body>

</html>
