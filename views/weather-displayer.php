<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <style>
        body {
            background: linear-gradient(to right, #2C5364, #0F2027);
            font-family: 'Arial', sans-serif;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .weather-container {
            width: 350px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.37);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            text-align: center;
        }

        .weather-header {
            font-size: 28px;
            margin-bottom: 15px;
        }

        .icon {
            width: 100px;
            height: 100px;
            margin: 15px auto;
        }

        .temp {
            font-size: 48px;
            font-weight: bold;
            margin: 10px 0;
        }

        .condition {
            font-size: 20px;
            font-weight: 300;
            margin: 5px 0;
        }

        .details {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .detail-item {
            font-size: 16px;
        }

        .btn-refresh {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #FF6F61;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-refresh:hover {
            background-color: #FF4F3E;
        }

        .footer {
            margin-top: 10px;
            font-size: 12px;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="weather-container">
        <div class="weather-header"><?php echo $weatherinfo['location']['name'].", ".$weatherinfo['location']['country'];?></div>
        <p>Local time:<?php echo  "  ".$weatherinfo['location']['localtime']?></p>
        <img src="https://cdn.weatherapi.com/weather/64x64/day/116.png" class="icon" alt="Weather Icon">
        <div class="temp"><?php echo $weatherinfo['current']['temperature_c']; ?> °C</div>
        <div class="condition"><?php echo $weatherinfo['current']['condition']; ?></div>
        <div class="details">
            <div class="detail-item">
                <p>Humidity</p>
                <p><?php echo $weatherinfo['current']['humidity']; ?></p>
            </div>
            <div class="detail-item">
                <p>Wind</p>
                <p><?php echo $weatherinfo['current']['wind_speed_kph']." kph"; ?></p>
            </div>
            <div class="detail-item">
                <p>Temperature in Kelvin</p>
                <p><?php echo $weatherinfo['current']['temperaturef']; ?> °F</p>
            </div>
        </div>
        <form action="indexweather.php">
            <button class="btn-refresh">Refresh</button>
        </form>
        <div class="footer">Updated: <?php echo $weatherinfo['current']['lastupdated'];?></div>
    </div>
</body>
</html>