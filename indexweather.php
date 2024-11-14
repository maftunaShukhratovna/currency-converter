<?php 
require 'weather.php';

$weather=new Weather();

$weatherinfo=$weather->getWeatherInfo();

require 'views/weather-displayer.php';

?>


