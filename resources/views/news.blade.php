<!DOCTYPE html>
<html lang="en">
<head>
  <title>News</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>News List</h2>
  {{-- <p>The .table-hover class enables a hover state on table rows:</p>  --}}
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Content</th>
        <th>Author</th>
        <th>Published</th>
        <th>Details</th>
        <th>Edit</th>
        <th>Delete</th>


      </tr>
    </thead>
    <tbody>
@foreach($news as $newss)
      <tr>
        <td>{{$newss->Title}}</td>
        <td>{{$newss->content}}</td>
        <td>{{$newss->author}}</td>

        @if( $newss->published=== 1)
        <td > Yes</td>
        @else
        <td > No
        @endif
      </td>
      <td><a href="newsDetails/{{$newss->id}}">Show</a></td>
        <td><a href="editNews/{{$newss->id}}">Edit</a></td>
        <td><a href="deleteNews/{{$newss->id}}">Delete</a></td>

       </tr>
@endforeach
       
    </tbody>
  </table>
</div>

</body>
</html>
