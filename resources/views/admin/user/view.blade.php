@extends('admin.layouts.app')
@section('headSection')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('main-content')

          <div class="card card-danger">
            <div class="card-header ">
              <h3 class="card-title ">List of Users</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>User_ID</th>
                  <th>User_Name</th>
                  <th>User_Email</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                  @foreach($users as $user)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td> {{ $user->id }}   </td>

                  <td>{{ $user->name }}</td>

                  <td> {{$user->email }}</td>
                  
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
