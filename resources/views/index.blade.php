<!DOCTYPE html>
<html lang="en">
<head>
    <title>Explore Items</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Explore Items</h2>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Rating</th>
                <th>Price</th>
                <th>Description</th>
                <th>Is Featured</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exploreItems as $exploreItem)
                <tr>
                    <td><img src="{{ asset($exploreItem->image) }}" alt="Explore Item Image" style="max-width: 100px;"></td>
                    <td>{{ $exploreItem->title }}</td>
                    <td>{{ $exploreItem->rating }}</td>
                    <td>{{ $exploreItem->price }}</td>
                    <td>{{ $exploreItem->description }}</td>
                    <td>{{ $exploreItem->is_featured ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
