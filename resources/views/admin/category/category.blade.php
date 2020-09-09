@extends('admin.layouts.app')
@section('main-content')
Category page

<div class="container-fluid">
<div class="row">
    <div class="col-md-3 offset-md-1">

      <div class="card card-danger">
        <div class="card-header">
          <h3 class="card-title">Add New Category</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form role="form" action="{{route('category.store')}}" method="post">
            {{csrf_field()}}

                <!-- text input -->
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter the name of the new Category ...">
                </div>

                <button type="submit" class="btn btn-danger">Add</button>
                <a class="btn btn-primary float-right" href="{{route('category.index')}}">Back</a>

          </form>
        </div>
      </div>
    </div>
</div>
@if(Session::has('success'))
<div class="row">
  <div class="col-md-3 offset-md-3">
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      {{Session::get('success')}}<br><strong>  {{$newCategory}}</strong>
    </div>
  </div>
</div>
@endif

@endsection
