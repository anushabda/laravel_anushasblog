@extends('admin.layouts.app')
@section('headSection')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('main-content')

          <div class="card card-danger">
            <div class="card-header ">
              <h3 class="card-title ">List of Categories </h3>
              <a class="btn btn-info float-right" href="{{route('category.create')}}">Add New</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Category_ID</th>
                  <th>Category_Name</th>
                  <th>Category_Slug</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>

                <tbody>
                  @foreach($categories as $category)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    <td> {{ $category->id }}   </td>
                    @if($category->id==$editCategory->id)
                      <td>
                        <form id ="updateCategory{{$category->id}}" action="{{route('category.update',$category->id)}}"  method="post">
                          {{ csrf_field() }}
                          {{ method_field('PATCH') }}
                          <input type="text" class="form-control" id="category" name="name" value="{{ $category->name }}" autofocus>
                        </form>
                      </td>
                    @else
                    <td>{{ $category->name }}</td>
                    @endif
                    <td> {{$category->slug }}</td>
                    <td>
                      <a href="{{route('category.edit',$category->id)}}">
                      <span><i class="fas fa-edit"></i></span>
                    </a>
                    </td>
                    <td>
                      <form id ="deleteCategory{{$category->id}}" action="{{route('category.destroy',$category->id)}}" style="display:none" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                      </form>
                      <a href="" onclick="event.preventDefault();
                      document.getElementById('deleteCategory{{$category->id}}').submit();">
                      <span><i class="far fa-trash-alt"></i></span>
                    </a>
                    </td>
                  </tr>
                  @endforeach
</tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
@endsection
@section('footerSection')
<!-- DataTables -->
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
  });
</script>
@endsection
