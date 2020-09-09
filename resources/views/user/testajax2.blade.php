<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
 <meta name="_token" content="{{ csrf_token() }}">
      <meta name="viewport" content="width=device-width, initial-scale=1">
       <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title></title>
  </head>
  <body>
    <div class="container-fluid">
      <form id="likeform" >
        <input type="text"id="name" name="name"></input>
        <button type="submit" class="btn btn-success"id="like" name="like" class="form-control" value="false">DisLike</button>
        <button type="submit" class="btn btn-danger"id="dislike"name="like" class="form-control" value="true">Like</button>


      </form>
    </div>
    <div id="lii" name="lii">
      Hello
    </div>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
                   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                   crossorigin="anonymous">
    </script>
    <script>
    jQuery(document).ready(function(){
           jQuery('#likeform button').click(function(e){
              e.preventDefault();
              var likee=$(this).attr("value");
              alert(likee);
              jQuery.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                 }
             });
              jQuery.ajax({
                 url: "{{ url('/post/1/testlike') }}",
                 method: 'post',
                 data:{

                 _token : '<?php echo csrf_token() ?>',


                   name:jQuery('#name').val(),
                   like:jQuery(this).attr("value")
                 },
                 success: function(result){
                      //console.log(result);
                      document.getElementById("lii").innerHTML=result.success;
                   }
                 });

              });
           });
           </script>
  </body>
</html>
