@extends('user/app')
@section('title','anushas blog')


<!-- Profile Data-->
<div class="card pb-4" style="height:400px;background-color:#330000">
  <div class="card-body">
<div class="row">



  <div class="col-sm-6">
    <img class="card-img-top img-fluid m0 p0" style="object-fit: none; /* Do not scale the image */
    object-position: center; /* Center the image within the element */
    width: 100%;

    max-height: 350px;
    " src="{{ asset('user/images/profilepicbg.jpg') }}" alt="Profile picture" >
  </div>
  <div class="card-img-overlay d-flex flex-wrap align-content-center justify-content-center">
    <div class="justify-content-center">
      <h1 style="font-size:6vw" class=" text-white  display-2 font-weight-bolder" >Anusha's Blog</h1><br><hr>
      <Center><h3 style="font-size:3vw"class=" text-white font-weight-bolder" >My Blog <small class="font-italic">To Share</small></h3></center>
      </div>
    </div>
  </div>
  <!--
  <p class="card-text">Some example text some example text. Some example text some example text. Some example text some example text. Some example text some example text.</p>
  <a href="#" class="btn btn-primary">See Profile</a>-->

      </div>
      </div><!--End Profile Data -->

    @section('main-content')

<div class="container" >


  <div class="row" >

    <!-- Blog Entries Column -->
    <div class="col-md-8">
      @if(Session::has('categoryPosts'))
      <h2 class="my-4">{{Session::get('categoryPosts')}}
        <small>{{Session::get('cat')}}</small>
      </h2>
      @elseif(Session::has('tagPosts'))
      <h2 class="my-4">{{Session::get('tagPosts')}}
        <small>{{Session::get('tagg')}}</small>
      </h2>
      @else
      <h2 class="my-4">My Blog
        <small>To share</small>
      </h2>
      @endif
      <!-- Blog Post -->

      @foreach($posts as $post)
        <div class="card  flex-row flex-wrap" style="background-color:LightSalmon">
          <div class="card-header border-0">
            <img  src=" {{ asset('images/'.$post->image) }} " alt="Card image cap" height="100" width="150" />
          </div>
          <div class="card-block px-2">
            <h3 class="card-title" style="color:#330000;">{{$post->title}}</h3>
            <p class="card-text "style="color:#330000;">{!!strip_tags(\Illuminate\Support\Str::words(htmlspecialchars_decode($post->body),70,"..."),'<br>')!!}</p>
            <a style="color:green;" href="{{route('post',$post->slug)}}">Go to Post &rarr;</a>
  </div>

          <div class="card-footer">

            Posted on {{date('M j,Y g:ia',strtotime($post->created_at))}} by
            <a href="#"class="text-secondary">Anusha</a>
        </div>


    </div>
    <br>
        @endforeach



      <!-- Pagination -->

      <div class="pagination justify-content-center mb-4">
        <span >{{$posts->links()}}</span>
      </div>

    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">
<div class="card card-my-4 mt-4" style="background-color:LightSalmon">
  <h5 class="card-header" style="color:#330000" >Search</h5>
  <div class="card-body">

  <form action="{{route('search')}}" method="post">
    {{ csrf_field() }}
  <div class="form-group">
    <div class="input-group ">
      <input list="searchtitles" id="searchtext" name="searchtext" type="text" class="form-control input-control" placeholder="Search for...">
      <datalist id="searchtitles">
      </datalist>
    </div>
  </div>
  <div class="form-group">
    <input type="hidden" id="searchid" value="default" name="searchid">
    <span class="form-group-btn">
      <button class="btn btn-secondary"id="searchbtn" type="submit">Go!</button>
    </span>
  </div>
</form>
<div id="errorcheck">
</div>
</div>
</div>



      <!-- Categories Widget -->
      <div class="card my-4" style="background-color:LightSalmon">
        <h5 class="card-header" style="color:#330000">Categories</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                @foreach ($categories->take(ceil(count($categories)/2)) as $category)
                <li>
                  <a class="btn btn-default " href="{{route('category',$category->slug)}}">{{$category->name}}</a>
                </li>
                @endforeach
              </ul>
            </div>
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                @foreach ($categories->slice(ceil(count($categories)/2)) as $category)
                <li>
                  <a class="btn btn-default" href="{{route('category',$category->slug)}}">{{$category->name}}</a>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- Tags Widget -->
      <div class="card my-4" style="background-color:LightSalmon">
        <h5 class="card-header" style="color:#330000">Tags</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                @foreach ($tags->take(ceil(count($tags)/2)) as $tag)
                <li>
                  <a class="btn btn-default" href="{{route('tag',$tag->slug)}}">{{$tag->name}}</a>
                </li>
                @endforeach
              </ul>
            </div>
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                @foreach ($tags->slice(ceil(count($tags)/2)) as $tag)
                <li>
                  <a class="btn btn-default" href="{{route('tag',$tag->slug)}}">{{$tag->name}}</a>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>


    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
<script>
$(document).ready(function(){

//Highlight the current link
   $(".active").removeClass("active");
   $("#link-home").addClass("active");

//Search live for posts
jQuery('#searchtext').keyup(function(e){
  var text= $('#searchtext').val();
  jQuery.ajax({
    url: " {{ route('search')}}",
    type: 'get',
    data: {
      text:$('#searchtext').val()
    },

    success: function(result){
      var len =result.titles.length;
      $('#searchtitles').empty();
      for(var i=0;i<len;i++){
        $('#searchtitles').append("<option value='"+result.titles[i]+"'data-id='"+result.ids[i]+"'></option");
      }
      var searchtext=$('#searchtext').val();
      var searchid=$('#searchtitles option[value="'+searchtext+'"]').attr('data-id');
      $('#searchid').val(searchid);//Assign the id of selected title to the hidden input
      },

    error:function(xhr,status,errorthrown){
      console.log(status);
      if(xhr.status===404){
        $('#errorcheck').html(xhr.responseText);
        $('#searchtitles').empty();
        $('#searchid').val(null);

      }
    },
  });
  });
});
</script>
@endsection
