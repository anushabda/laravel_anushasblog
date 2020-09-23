@extends('user/app')
@section('title')
{{$post->title}}
@endsection
@section('headsection')
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="token" content="{{ csrf_token() }}">
@endsection
@section('main-content')

<div class="container">

  <div class="row">

    <!-- Post Content Column -->
    <div class="col-lg-8">

      <!-- Title -->
      <h1 class="mt-4">{{$post->title}}</h1>

      <!-- Author -->
      <p class="lead">
        by
        <a href="#">Anusha</a>
      </p>

      <hr>

      <!-- Date/Time -->
      <p>Created on {{date('M j,Y g:ia',strtotime($post->created_at))}}
        <span class="pullright">{{$post->category()->first()->name}}</span>
    </p>

      <hr>

      <!-- Preview Image
      <img class="img-fluid rounded" src="http://placehold.it/900x300" alt=""> -->
      <img class="img-fluid rounded" src="{{ asset('images/'.$post->image)  }}" width="100%" height="auto" alt="">

      <hr>

      <!-- Post Content -->
      {!! htmlspecialchars_decode($post->body) !!}

<hr>
<div>
  @foreach($post->tags as $tag)
  {{$tag->name}}
  @endforeach
</div>
</hr>
      <hr>

      <!-- Comments Form -->
      <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
          <form action="{{route('comment.store',$post->id)}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <textarea class="form-control" rows="3" name="comment"></textarea>
            </div>
            @guest
            <a class="btn btn-primary"href="{{route('login')}}">Submit</a>
            @else
            <button type="submit" class="btn btn-primary">Submit</button>
            @endguest
          </form>
        </div>
      </div>

      <!-- Single Comment -->
        @foreach($post->comments->sortByDesc('created_at') as $comment)
      <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
          <h5 class="mt-0">

            {{ $comment->user->name }}
         </h5>
          {{ $comment->comment }}
        </div>
      </div>
      @endforeach

      <!-- Comment with nested comments -->
      <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
          <h5 class="mt-0">Commenter Name</h5>
          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

          <div class="media mt-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
          </div>

          <div class="media mt-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
          </div>

        </div>
      </div>

    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">

      <!-- Search Widget -->

      <!-- Categories Widget -->
      <div class="card my-4">
        <div class="card-body">

      <form id="likeform" >
          <div class="row justify-content">
        <div class="col">
        <button type="submit" class="btn btn-success"id="like" name="like" class="form-control" value="true">
          <span><i class="far fa-thumbs-up"></i></span></button>
        <span id="likecount" name="likecount">
          {{$post->like}}
        </span>
      </div>
        <div class="col">
        <button type="submit" class="btn btn-danger"id="dislike"name="like" class="form-control" value="false"><span ><i class="far fa-thumbs-up"></i></span></button>
        <span id="dislikecount" name="dislikecount">
          {{$post->dislike}}
        </span>
      </div>
    </div>
      </form>

    </div>
  </div>
  <div id="lii" name="lii" style="display:none">
    Please login to like / dislike
    <a href="{{route('login')}}">login</a>
  </div>


  <!-- Comments Form -->
  <div class="card my-4">
    <h5 class="card-header">Leave a Comment:</h5>
    <div class="card-body">
      <form action="{{route('comment.store',$post->id)}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <textarea class="form-control" rows="3" name="comment"></textarea>
        </div>
        @guest
        <a class="btn btn-primary"href="{{route('login')}}">Submit</a>
        @else
        <button type="submit" class="btn btn-primary">Submit</button>
        @endguest
      </form>
    </div>
  </div>

  <!-- Single Comment -->

@if(count($post->comments)!=0)
    @foreach($post->comments->sortByDesc('created_at') as $comment)

    <div class="media mb-4">
      <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
          <h5 class="mt-0">
            {{ $comment->user->name }}
          </h5>
          {{ $comment->comment }}
        <div>

          <button id="{{$comment->id}}" type="button">Replies </button>
<div id="{{'replysection_'.$comment->id}}" style="display:none">
          <form id="{{'replyform'.$comment->id}}" class="repform">

            <input type="hidden" name="post_id" value="{{$post->id}}" />
            <input type="hidden" name="comment_id" value="{{$comment->id}}" />

              <textarea class="form-control" rows="3" id="replytext" name="replytext"></textarea>

            <button id="replysubmit" class="replysubmit" type="submit">Submit</button>
          </form>
      <!-- replies for comment -->
          @if(count($post->replies)!=0)
          @foreach($post->replies->where('comment_id','=',$comment->id) as $reply)

<div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
<div class="media-body" >
            <h5 class="mt-0">

              {{ $reply->user->name }}
           </h5>
            {{ $reply->replytext }}
</div>
</div>

          @endforeach
@endif

</div><!--end of reply section-->

  </div>
</div>
</div>
  @endforeach
@endif

    

    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
</script>
<script>
jQuery(document).ready(function(){

  //Toggling comments for reply
  $('*').click(function(){
    var ids=$(this).attr('id');
    $('#replysection_'+ids).toggle();
  
    });
//Submit the reply
$(".repform button").on('click',function(e){
  
    e.preventDefault();
  
   var frmID = $(this).closest('form').attr('id');
   
  
 var form_data =$("#"+frmID).serialize();
  

  jQuery.ajaxSetup({
    headers:{
  'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
    },
  });
  jQuery.ajax({
     url: " {{ route('comment.reply')}}",
     method: 'post',
     enctype: 'form-data',
     data:
     {
      // "token":"{{csrf_token()}}",
      form_data:form_data,

    },
     success: function(result){
         // console.log(result.success);
          alert(result.success);
               },
           });
});

       jQuery('#likeform button').click(function(e){
          e.preventDefault();
          jQuery.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
             },
             statusCode: {
               //unauthorised user
				           401: function(){
                     //document.getElementById("lii").innerHTML="Please login to like/ dislike";
                     document.getElementById("lii").style.display="block";
					         // Redirec the user  to the login page.
					         //location.href = "/login";
				       }
			       }
         });
          jQuery.ajax({
             url: " {{ route('like.store')}}",
             method: 'post',
             enctype: 'form-data',
             data: {
               "token":"{{csrf_token()}}",
               post_id:{{$post->id}},
               like:jQuery(this).attr("value"),
             },
             success: function(result){
                 
                  document.getElementById("likecount").innerHTML=result.success.likecount;
                  document.getElementById("dislikecount").innerHTML=result.success.dislikecount;
               },
               error: function(xhr,status,response){
                 console.log(status);
               }

             });

          });
       });
       </script>
@endsection
