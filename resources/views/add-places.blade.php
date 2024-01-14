 
<!DOCTYPE html>
<html lang="en">
{{-- <head>
  <title>Add places</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head> --}}
@include('includes.head')
<body>
  @include('includes.header')
  @include('includes.topArea')
   

<div class="container">
  <h2>Add place</h2>
  <form action="/explore" method="POST"  enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="image">image:</label>
      <input type="file" class="form-control" id="image" placeholder="Enter image" name="image"  >
    
    </div>
    <div class="form-group">
        <label for="title">title:</label>
        <input type="text" class="form-control" id="title" placeholder="Enter title" name="title"  >
      
      </div>

      <div class="form-group">
        <label for="rating">rating:</label>
        <input type="text" class="form-control" id="rating" placeholder="Enter rating" name="rating"  >
      
      </div>
      <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price" value="{{ old('price') }}">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" rows="5" id="description" name="description"  value="{{ old('description') }}"></textarea>
        
      </div> 
       
    <div class="checkbox">
      <label><input type="checkbox" name="is_featured"> is_featured </label>
    </div>
    <button type="submit" class="btn btn-default">Add</button>
  </form>
</div>
@include('includes.footer')
@include('includes.footerJS')
</body>
</html>
