<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.layouts.head')
  @section('headSection')
  @show
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<div class="content-wrapper">
@section('main-content')
@show
</div>
@include('admin.layouts.footer')
@section('footerSection')
@show

</div>


</body>

</html>
