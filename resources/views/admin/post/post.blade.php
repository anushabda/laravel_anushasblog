@extends('admin/layouts/app')
@section('main-content')

<section class="content">
  <div class="container-fluid">
    <div>
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
     <strong> Success: </strong>{{Session::get('success')}}
    </div>
    @endif
  </div>
      <div class="card  card-danger">
      <!-- left column -->
        <div class="row">
      <div class="col-12">
        <!-- general form elements -->

          <div class="card-header">
            <h3 class="card-title" >Add the post here</h3>
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
          <form role="form" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-8 ">
                  <label for="title">Post Title</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" placeholder="Enter Post title here">
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
                <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}"placeholder="Enter Post slug here">
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
                    <input type="file"  id="imageFile" name="imageFile" />
                  </div>
                </div>
              </div>



              <div class="form-group col-md-10">
                  <label for="postContent">Post Content</label>
                  <span class="text-danger font-weight-bold ">*</span>
                  {!!($errors->has('postBody'))?$errors->first('postBody','<span class="text-danger font-weight-bold">:message</span>'):''!!}
                        <textarea class="textarea"name="postBody" placeholder="Place some text here"
                          style="width: 100%;padding-top:3px;height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; "></textarea>
              </div>

  <div class="row">
    <div class="col-sm-4">
      <!-- select -->
      <div class="form-group">
        <label>Select Category</label>
        <select class="form-control" name="selectedCategory">
          @foreach($categories as $category)
          @if( count($errors)>0)
          @if(old('selectedCategory')==$category->id)
          <option value="{{$category->id}}" selected="selected">{{$category->name}}</option>
          @else
          <option value="{{$category->id}}">{{$category->name}}</option>
          @endif
          @else
          <option value="{{$category->id}}">{{$category->name}}</option>selected
          @endif
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
          @if(count($errors)>0)


          <option value="{{$tag->id}}"
            @if(old('selectedTags'))
            @foreach(old('selectedTags') as $selectedTag)
             @if($selectedTag==$tag->id)
             selected="selected"
             @endif

            @endforeach
             @endif
             >{{$tag->name}}
           </option>


          @else
          <option value="{{$tag->id}}">{{$tag->name}}</option>
          @endif
          @endforeach
        </select>
      </div>
    </div>
</div>

            <!-- /.card-body -->

            <div class="form-check">
            <div class="card-footer ">
              <input type="hidden" name="publish" value="0">
                <input type="checkbox" class="form-check-input" name="publish" value="1"/>
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


@endsection
