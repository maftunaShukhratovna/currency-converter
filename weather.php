<?php

class Weather{
    const Weather_API_URL = "http://api.weatherapi.com/v1/current.json?key=6f646c326fa247a398b23404241411&q=Tashkent";

    public array $weatherinfo=array();

    public function __construct(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::Weather_API_URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

        $output=curl_exec($ch);
        curl_close($ch);

        $this->weatherinfo = json_decode($output,true);
    }

    public function getWeatherInfo(){
        $weather_info=$this->weatherinfo;

        $weatherinformation = [
            'location' => [
                'name' => $weather_info['location']['name'] ?? 'N/A',
                'region' => $weather_info['location']['region'] ?? 'N/A',
                'country' => $weather_info['location']['country'] ?? 'N/A',
                'localtime'=>$weather_info['location']['localtime'] ??'N/A',
            ],
            'current' => [
                'temperature_c' => $weather_info['current']['temp_c'] ?? 'N/A',
                'condition' => $weather_info['current']['condition']['text'] ?? 'N/A',
                'humidity' => $weather_info['current']['humidity'] ?? 'N/A',
                'wind_speed_kph' => $weather_info['current']['wind_kph'] ?? 'N/A',
                'temperaturef' => $weather_info['current']['temp_f'] ?? 'N/A',
                'lastupdated'=>$weather_info['current']['last_updated'] ?? 'N/A',
            ]
        ];

        return $weatherinformation;
    }


}