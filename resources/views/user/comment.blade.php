<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title></title>
  </head>
  <body>
    <div class="container">
      <form id="commentform" method="post" data-route="{{route('post.comment')}}">
        {{ csrf-field() }}
        <input type="hidden" name="post_id" value="1"></input>
        <textarea name="commenttext" rows="3"></textarea>
        <button type="submit" id="commentsubmit">submit</button>
      </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{asset('js/comment.js')}}"></script>
  </body>
</html>
