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
      <!-- <img class="img-fluid rounded" src="{{ asset('images/'.$post->image)  }}" width="100%" height="auto" alt=""> -->

      

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

      
    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">

     
      <!-- Categories Widget -->
      <div class="card my-4" style="background-color:LightSalmon">
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
  <div class="card my-4" style="background-color:LightSalmon">
    <h5 class="card-header" >Leave a Comment:</h5>
    <div class="card-body">
      <form id="commentForm">
       
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
<!--New comment-->
<div id="newcomment">
</div>
<div id="loadmore">
  <button id="loadmorebtn">load more</button>
</div>
 
</div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
</script>
<script src="/js/commentsection.js"></script>
<script>
jQuery(document).ready(function(){
 
 
  //Load first 5 comments initially from pagination->5
  var nextpageurl="";
  commentUpdate(nextpageurl);  

  function commentUpdate(nextpageurl){
      var post_id="{{$post->id}}";
  
      var newcomment = document.querySelector('#newcomment') ;
      if(nextpageurl==''){
        newcomment.innerHTML = "";
        var url = " {{ route('comment.index',$post->id)}}";
      }
      else
        var url =nextpageurl;

    jQuery.ajax({
      url: url,
      success:function(result){
            
          $('#commentForm').trigger('reset');
          var details = result.comments.data;
          var mincomments = result.comments.data.length;
          for( let i= 0 ;i<mincomments;i++){
             newcomment.innerHTML += cloneComment(i,`template${i}`,details[i],post_id);       
          }
          //set the global variable nexturl
          nexturl= result.comments.next_page_url;
          
          //----------------------Toggling the Reply Section---------------------------
          replyToggler();

            //-------------------Submitting the Reply---------------------------------
            $('.replysubmit').click(function(e){
                  e.preventDefault();
                  var replyurl="{{route('comment.reply')}}";
                  var frmID = $(this).closest('form').attr('id');
                            var form_data =$("#"+frmID).serialize();
                  replySubmitter(replyurl,frmID,form_data);                   
            });
       }
    });
  }//end function commentUpdate
  //setInterval(commentUpdate,10000);

//Load Morecomments section
  $('#loadmorebtn').on('click',function(){
    if(nexturl!= null){
      commentUpdate(nexturl);
        }
        else
        {
        alert('No more comments');
         }
  });  
        
    //Submit the comment
  $('#commentForm').on('submit',function(e){
        e.preventDefault();
        var form_data = $('#commentForm').serialize();
       
        jQuery.ajaxSetup({
            headers:{
          'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
            },
          });
        jQuery.ajax({
                  
                url: " {{ route('comment.store',$post->id)}}",
                method: 'post',
                enctype: 'form-data',
                data:
                {
                // "token":"{{csrf_token()}}",
                form_data:form_data,

                },
                success: function(result){
                    console.log(result);
                    commentUpdate('');
                          }
              });

             });
//Submit the reply
$(".repform button").on('click',function(e){
  
    e.preventDefault();
  
   var frmID = $(this).closest('form').attr('id');
  // console.log(frmID);
 
 var form_data =$("#"+frmID).serialize();
 //console.log(form_data);

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
          //console.log(result);
          alert(result.success);
          //commentUpdate();
               },
     error:function(xhr,status,error){
                 var statusCode = xhr.status;
                 var errors = JSON.parse(xhr.responseText);
                 
                 switch(statusCode){
                   case 400:
                   {
                   var errormsgs= errors.errormsgs.replytext;
                    alert(errormsgs);
                    
                   break;
                   }
                   case 401:
                   {
                   alert(errors.errormsgs);
                   break;
                   }
                 }
                
                 //alert(xhr.responseText);
                 
               },
           });
});
//Like buttons
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
