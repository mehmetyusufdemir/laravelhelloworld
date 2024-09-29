<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            font-size: 2em;
        }
        .weather-info {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Weather in {{ $weather['name'] }}</h1>
        <div class="weather-info">
            <p><strong>Temperature:</strong> {{ $weather['main']['temp'] }} °C</p>
            <p><strong>Weather:</strong> {{ $weather['weather'][0]['description'] }}</p>
            <p><strong>Humidity:</strong> {{ $weather['main']['humidity'] }}%</p>
        </div>
    </div>
</body>
</html>
