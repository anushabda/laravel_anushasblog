@extends('user/app')
@section('title','anushas blog')


<!-- Profile Data-->
<div class="card pb-4" style="height:400px;background-color:#330000">
  <div class="card-body">
<div class="row">

  <div class="col-sm-6 ">
    Anusha is an Entry-level Web Developer seeking a professional role in software, growing with the technology with an outstanding work ethic and computer language knowledge base. Able to work well independently or as part of a team.
  </div>

  <div class="col-sm-6">
    <img class="card-img-top img-fluid m0 p0" style="object-fit: none; /* Do not scale the image */
    object-position: center; /* Center the image within the element */
    width: 100%;

    max-height: 350px;
    " src="{{ asset('user/images/profilepicbg.jpg') }}" alt="Profile picture" >
  </div>
  <div class="card-img-overlay d-flex flex-wrap align-content-center justify-content-center">
    <div class="justify-content-center">
      <h1 class=" text-white  display-2 font-weight-bolder" >Anusha's Blog</h1><br><hr>
      <Center><h3 class=" text-white font-weight-bolder" >My Blog <small class="font-italic">To Share</small></h3></center>
      </div>
    </div>
  </div>
  <!--
  <p class="card-text">Some example text some example text. Some example text some example text. Some example text some example text. Some example text some example text.</p>
  <a href="#" class="btn btn-primary">See Profile</a>-->

      </div>
      </div><!--End Profile Data -->

    @section('main-content')

<div class="container">


  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">
      @if(Session::has('categoryPosts'))
      <h1 class="my-4">{{Session::get('categoryPosts')}}
        <small>{{Session::get('cat')}}</small>
      </h1>
      @elseif(Session::has('tagPosts'))
      <h1 class="my-4">{{Session::get('tagPosts')}}
        <small>{{Session::get('tagg')}}</small>
      </h1>
      @endif
      <h1 class="my-4">My Blog
        <small>To share</small>
      </h1>
      <!-- Blog Post -->
      @foreach($posts as $post)

      <div class="card mb-4">

        <img class="card-img-top" src=" {{ asset('images/'.$post->image) }} " alt="Card image cap" height="300" width="700" />

        <div class="card-body">
          <h2 class="card-title">{{$post->title}}</h2>
          <p class="card-text">{!!htmlspecialchars_decode($post->body)!!}</p>
          <a href="{{route('post',$post->slug)}}" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
          Posted on {{date('M j,Y g:ia',strtotime($post->created_at))}} by
          <a href="#">Start Bootstrap</a>
        </div>
      </div>
      @endforeach




      <!-- Pagination -->

      <div class="pagination justify-content-center mb-4">
        {{$posts->links()}}
      </div>

    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">

      <!-- Search Widget -->
      <div class="card my-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>

      <!-- Categories Widget -->
      <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                @foreach ($categories->take(ceil(count($categories)/2)) as $category)
                <li>
                  <a href="{{route('category',$category->slug)}}">{{$category->name}}</a>
                </li>
                @endforeach
              </ul>
            </div>
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                @foreach ($categories->slice(ceil(count($categories)/2)) as $category)
                <li>
                  <a href="{{route('category',$category->slug)}}">{{$category->name}}</a>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- Tags Widget -->
      <div class="card my-4">
        <h5 class="card-header">Tags</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                @foreach ($tags->take(ceil(count($tags)/2)) as $tag)
                <li>
                  <a href="{{route('tag',$tag->slug)}}">{{$tag->name}}</a>
                </li>
                @endforeach
              </ul>
            </div>
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                @foreach ($tags->slice(ceil(count($tags)/2)) as $tag)
                <li>
                  <a href="{{route('tag',$tag->slug)}}">{{$tag->name}}</a>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- Side Widget -->
      <div class="card my-4">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-body">
          You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
        </div>
      </div>

    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
@endsection
