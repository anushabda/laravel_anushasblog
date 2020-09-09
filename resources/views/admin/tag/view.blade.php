@extends('admin.layouts.app')
@section('headSection')

@endsection
@section('main-content')

          <div class="card card-danger">
            <div class="card-header ">
              <h3 class="card-title ">List of Tags </h3>
              <a class="btn btn-info float-right" href="{{route('tag.create')}}">Add New</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tagList" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Tag_ID</th>
                  <th>Tag_Name</th>
                  <th>Tag_Slug</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($tags as $tag)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td> {{ $tag->id }}   </td>
                  <td>{{ $tag->name }}</td>
                  <td> {{$tag->slug }}</td>
                  <td><a href="{{route('tag.edit',$tag->id)}}">
                  <span><i class="fas fa-edit"></i></span>
                </a></td>
                  <td>  <form id ="deleteTag{{$tag->id}}" action="{{route('tag.destroy',$tag->id)}}" style="display:none" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                    </form>
                    <a href="" onclick="event.preventDefault();
                    document.getElementById('deleteTag{{$tag->id}}').submit();">
                    <span><i class="far fa-trash-alt"></i></span>
                  </a></td>
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
    $("#tagList").DataTable();
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
