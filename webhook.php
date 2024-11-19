<?php
require 'source/telegram.php';

$content = file_get_contents("php://input");
$update = json_decode($content, true);

if (isset($update['message'])) {
    $chatId = $update['message']['chat']['id'];
    $text = $update['message']['text'];

    $bot = new Bot();

    if (strtolower($text) == "/start") {
        $response = "Salom! Bu bot ob havoni va valyuta kursini ko`rsatadi\n";
        $response .= "/currency - Valyuta kurslari\n";
        $response .= "/weather - Toshkent Ob-havo malumotlari\n";
        $bot->sendMessage($chatId, $response);
    } elseif (strtolower($text) == "/currency") {
        require 'source/currency.php';
        $currency = new Currency();
        $currencies = $currency->getCurrencies();

        $response = "Valyuta kurslari \n";
        $counter = 0;
        foreach ($currencies as $key => $rate) {
            if ($counter >= 10) break; 
            $response .= "1 ". $key . ": " . round($rate, 2) . " sum \n";
            $counter++;
        }
        $bot->sendMessage($chatId, $response);
    } elseif (strtolower($text) == "/weather") {
        require 'source/weather.php';
        $weather = new Weather();
        $weatherInfo = $weather->getWeatherInfo();

        $response = "Toshkent Ob-havo ma'lumotlari:\n";
        $response .= "Joy: " . $weatherInfo['location']['name'] . ", " . $weatherInfo['location']['country'] . "\n";
        $response .= "Harorat: " . $weatherInfo['current']['temperature_c'] . " °C\n";
        $response .= "Namlik: " . $weatherInfo['current']['humidity'] . "%\n";
        $response .= "Shamol: " . $weatherInfo['current']['wind_speed_kph'] . " kph\n";
        $bot->sendMessage($chatId, $response);
    } else {
        $bot->sendMessage($chatId, "bot ishlamayapti");
    }
}
