{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News Details</title>
</head>
<body>
    News Title : {{$news->Title}}
    <br> 
    Content : {{$news->content}}
    <br>
    Author :{{$news->author}}
    <br>
    Published :{{$news->published}}
     
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f0f0f0;
            text-align: center;
        }

        .news-details {
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

        .author-info {
            margin-top: 20px;
            font-style: italic;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="news-details">
        <h1>{{$news->Title}}</h1>
        <p>{{$news->content}}</p>
        <div class="author-info">
            <p>Author: {{$news->author}}</p>
            <p>Published: {{$news->published}}</p>
        </div>
    </div>
</body>
</html>
