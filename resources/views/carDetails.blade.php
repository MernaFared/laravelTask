{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car Details</title>
</head>
<body>
    Cer Title : {{$car->carTitle}}
    <br> 
    Car description : {{$car->description}}
    <br>
    Price :
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f0f0f0;
            text-align: center;
        }

        .car-details {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <div class="car-details">
        <h1>{{$car->carTitle}}</h1>
        <p>{{$car->description}}</p>
        <p>published: {{$car->published}}</p>
        <p>category: {{  $car->category->categoryName }}</p>
    </div>
</body>
</html>
