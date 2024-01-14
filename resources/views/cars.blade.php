<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Cars List</h2>
              
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Content</th>
        <th>Category</th>
        <th>Published</th>
         <th>Details</th>
        <th>Edit</th>
        <th>Delete</th>
 


      </tr>
    </thead>
    <tbody>
@foreach($cars as $car)
      <tr>
        <td>{{$car->carTitle}}</td>
        <td>{{$car->description}}</td>
        <td>  {{  $car->category->categoryName }} </td>
        @if( $car->published=== 1)
        <td > Yes</td>
        @else
        <td > No
        @endif
      </td>    
        <td><a href="carDetails/{{$car->id}}">Show</a></td>
        <td><a href="editCar/{{$car->id}}">Edit</a></td>
        <td><a href="deleteCar/{{$car->id}}">Delete</a></td>

    



       </tr>
@endforeach
       
    </tbody>
  </table>
</div>

</body>
</html>
