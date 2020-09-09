@extends('admin.layouts.app')
@section('headSection')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('main-content')
@if(Session::has('update'))
<div class="row">
<div class="col-md-3 offset-md-3">


<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert">&times;</button>
 {{Session::get('update')}}<br><strong>  </strong>
</div>

</div>
</div>
@endif
          <div class="card card-danger">
            <div class="card-header ">
              <h3 class="card-title ">List of Posts </h3>
              <a class="btn btn-info float-right" href="{{route('post.create')}}">Add New</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Post_ID</th>
                  <th>Post_Title</th>
                  <th>Likes</th>
                  <th>Dislikes</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($posts as $post)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td> {{ $post->id }}   </td>
                  <td>{{ $post->title }}</td>
                  <td> {{$post->likes }}</td>
                  <td> {{$post->dislikes }}</td>
                  <td><a href="{{route('post.edit',$post->id)}}"><span><i class="fas fa-edit"></i></span></a></td>
                  <td>
                    <form id="deleteForm{{$post->id}}"action="{{route('post.destroy',$post->id)}}" method="post" style="display:none">
                      {{csrf_field() }}
                      {{ method_field('DELETE') }}
                    </form>
                      <a href="" onclick="
                      if(confirm('Are you sure to delete this post'))
                      {
                        event.preventDefault();
                        document.getElementById('deleteForm{{$post->id}}').submit();
                      }
                        else
                        {
                          event.preventDefault();
                        }"
                        >
                        <span><i class="far fa-trash-alt"></i></span>
                      </td>
                </tr>
                @endforeach

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
