@extends('user/app')
@section('title','anushas blog-contact')
@section('headsection')
<link rel="stylesheet" href="{{asset('/user/css/about.css')}}">
@endsection
@section('main-content')


    <!-- Main content -->

      <div class="container-fluid bgcontact">
        <div>
        <div class="p-4">
          @if(Session::has('success'))
          <div class="alert alert-success alert-dismissible justify-content-center">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
           <strong> Success: </strong>{{Session::get('success')}}
          </div>
          @else
          <h4 class="text-success">Got something to tell me?</h4><br>
          <h3 class="text-danger">Your suggestions and feedback means a lot !!!</h3>
          @endif

        </div>
<!--
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
-->
        <div class="row justify-content-center" >

          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card" >
              <div class="card-header" >
                <h3 class="card-title font-weight-bold "style="color:#330000;" >Contact Me</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form role="form" action="{{route('contact.store')}}" method="post"  >
                  {{csrf_field()}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name<span class="text-danger">*</span></label>
                      {!!($errors->has('name'))?$errors->first('name','<span class="text-danger font-weight-bold">:message</span>'):''!!}
                    <input type="text" class="form-control" name="name" >
                  </div>
                  <div class="form-group">
                    <label for="email">Email address<span class="text-danger">*</span></label>
                    {!!($errors->has('name'))?$errors->first('email','<span class="text-danger font-weight-bold">:message</span>'):''!!}
                    <input type="email" class="form-control" id="email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="subject">Subject<span class="text-danger">*</span></label>
                    {!!($errors->has('name'))?$errors->first('subject','<span class="text-danger font-weight-bold">:message</span>'):''!!}
                    <input type="text" class="form-control" name="subject" >
                  </div>
                  <div class="form-group">
                    <label for="message">Message<span class="text-danger">*</span></label>
                    {!!($errors->has('name'))?$errors->first('message','<span class="text-danger font-weight-bold">:message</span>'):''!!}
                    <textarea class="form-control textarea" rows="5" name="message"></textarea>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Send Message</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
</div>
<script>
$(document).ready(function(){
   $(".active").removeClass("active");
   $("#link-contact").addClass("active");
});
</script>

@endsection
