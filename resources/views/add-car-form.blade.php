<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Car</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add Car</h2>
  <div class="text-center">
    <hr>
    <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="btn" style="width: 150px; color:#fff;background-color: #8f8b8b">{{__('addCar.english')}}</a>
    <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}" style="width: 150px; color:#fff;background-color: #8f8b8b" class="btn">{{__('addCar.arabic')}}</a>
    <hr>
</div>
  <form action="{{ route('receive') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
     <label for="title">Title:</label>
      <input  type="text" class="form-control" id="title" placeholder="Enter title" name="carTitle"  value="{{ old('carTitle') }}" >

      <label for="title">{{__('addCar.carTitleLabel')}}</label>
      <input type="text" class="form-control" id="carTitle" placeholder="{{__('addCar.carTitlePlaceholder')}}" name="carTitle" value="{{old('carTitle')}}">
      @error('carTitle')
      <div class="alert alert-warning">
          {{ $message }}
      </div>
      @enderror
    
    </div>
    {{-- <div class="form-group">
      <label for="price">Price:</label>
      <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price">
    </div> --}}
    <div class="form-group">
        <label for="description">Description:</label>
        <label for="description">{{__('addCar.descriptionLabel')}}</label>

        <textarea class="form-control" rows="5" id="description" name="description"  value="{{ old('description') }}"></textarea>
        @error('description')
        <div class="alert alert-warning">
        {{ $message }}
        </div>
    @enderror
      </div> 
      <div class="form-group">
        <label for="image">Image:</label>
        <label for="image">{{__('addCar.imageTitle')}}</label>
        <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
        @error('image')
            {{ $message }}
        @enderror
    </div>

    <div class="form-group">
      <label for="category">Category:</label>
            <label for="category">{{__('addCar.categoryLabel')}}</label>
      <select name="category_id" id="">
          <option value="">Select Category</option>
          <option value="">{{__('addCar.categorySelect')}}</option>
          @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->categoryName}}</option>
         @endforeach
        </select>
      </div>
          <div class="checkbox">
      <label><input type="checkbox" name="published"> Published </label>
      <div class="form-group">
        <label> <input type="checkbox" name="published"> {{__('addCar.publishedTitle')}}</label>
    </div>
    </div>
    <button type="submit" class="btn btn-default">Add</button>
    <button type="submit" class="btn btn-default">{{__('addCar.button')}}</button>

  </form>
</div>

</body>
</html>
