@extends('admin/layouts/app')
@section('main-content')

<section class="content">
  <div class="container-fluid">

      <div class="card  card-danger">
      <!-- left column -->
        <div class="row">
          <div class="col-12">
        <!-- general form elements -->
            <div class="card-header">
              <h3 class="card-title" >Edit your post here</h3>
            </div>
          </div>
        </div>
          <!-- /.card-header -->
          @if (count($errors)>0)
          @foreach ($errors->all() as $error)
          <div>  {{ $error }}</div>
          @endforeach
          @endif



          <!-- form start -->
          <form role="form" action="{{ route('post.update',$post->id) }}" method="post"enctype="multipart/form-data">
            {{ csrf_field() }}
            {{method_field('PATCH') }}
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-8 ">
                  <label for="title">Post Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter Post title here" value="{{$post->title}}">
                </div>
                
                <div class="col-md-4">
                  <br>
                    <span class="text-danger font-weight-bold ">*</span>
                    {!!($errors->has('title'))?$errors->first('title','<span class="text-danger font-weight-bold">:message</span>'):''!!}
                </div>
              </div>
            <div class="row">
              <div class="form-group col-md-8">
                <label for="slug">Post Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Post slug here"value="{{$post->slug}}">
              </div>
              <div class="col-md-4">
                <br>
                  <span class="text-danger font-weight-bold ">*</span>
                  {!!($errors->has('slug'))?$errors->first('slug','<span class="text-danger font-weight-bold">:message</span>'):''!!}
              </div>
            </div>


              <div class="form-group col-md-8">
                <label for="imageFile">Post Image</label>


                <div class="input-group">
                  <div class="custom-file">

                      <input type="file"  id="imageFile" name="imageFile" onchange="imgchng()"/>
                      <img class="img-thumbnail" id="imgch"src="{{asset('images/'.$post->image)}}" height="60" width="100" alt="Post Image" >
                      {!!($errors->has('imageFile'))?$errors->first('imageFile','<span class="text-danger font-weight-bold">:message</span>'):''!!}
                  </div>

                </div>
              </div>



              <div class="form-group col-md-10">
                  <label for="postContent">Post Content</label>
                  <span class="text-danger font-weight-bold ">*</span>
                  {!!($errors->has('postBody'))?$errors->first('postBody','<span class="text-danger font-weight-bold">:message</span>'):''!!}
                        <textarea class="textarea"name="postBody" placeholder="Place some text here"
                          style="width: 100%;padding-top:3px;height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; ">{{$post->body}}</textarea>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <!-- select -->
                  <div class="form-group">
                    <label>Select Category</label>
                    <select class="form-control" name="selectedCategory">
                      @foreach($categories as $category)

                      <option value="{{$category->id}}"
                          @if($category->id==$post->category_id)selected
                          @endif
                          >{{$category->name}}</option>

                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-sm-4">
                  <!-- Select multiple-->
                  <div class="form-group">
                    <label>Select Multiple Tags</label>
                    <select multiple class="form-control" name="selectedTags[]">
                      @foreach($tags as $tag)
                      <option value="{{$tag->id}}"
                        @foreach($post->tags as $posttag)
                        @if($posttag->id==$tag->id)
                        selected

                        @endif
                        @endforeach
                        >{{$tag->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
            </div>

            <!-- /.card-body -->

            <div class="form-check">
            <div class="card-footer ">


                <input type="checkbox" class="form-check-input" name="publish"
                @if($post->status==1) checked
                @endif>
                <label class="form-check-label" for="publish">Publish</label>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger " href="{{route('post.index')}}">Back</a>
              </div>

            </div>

          </form>
        </div>
        </div>
</div>
</div>
</div>

</section>

<script type="text/javascript">

    function imgchng() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("imageFile").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("imgch").src = oFREvent.target.result;
        };
    };

</script>

@endsection
