<!DOCTYPE html>
<html>
<head>
    <title>Page Not Found</title>
    <style>
        body {
            background-color: #f3f4f6;
            color: #333;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        h1 {
            font-size: 100px;
            margin: 0;
            color: #ff6347;
        }
        h2 {
            font-size: 24px;
            color: #555;
        }
        p {
            font-size: 18px;
            color: #666;
        }
        .container {
            margin-top: 100px;
        }
        .home-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #ff6347;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .home-button:hover {
            background-color: #ff4500;
        }
        .illustration {
            max-width: 300px;
            margin: 30px auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <h2>Oops! There's Nothing Here...</h2>
        <p>It looks like the page you are looking for doesn't exist. Maybe it was lost in the void of the internet.</p>
        <a href="{{ url('/') }}" class="home-button">Go Home</a>
        {{-- <div class="illustration">
            <img src="https://i.imgur.com/oCkEbrA.png" alt="404 illustration" />
        </div> --}}
    </div>
</body>
</html>
