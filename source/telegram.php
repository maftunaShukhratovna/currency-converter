<?php

class Bot{
    const API_URL="https://api.telegram.org/bot";
    private $token="7690320134:AAHBcOfzOZwtgZO_2WIH5WYpatxC5I3G6J8";

    public function makeRequest($method,$data=[]){
        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL, self::API_URL . $this->token . '/' . $method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($ch);
        curl_close($ch);
        var_dump($response);
    }
    public function sendMessage($chatId, $message) {
        return $this->makeRequest('sendMessage', [
            'chat_id' => $chatId,
            'text' => $message
        ]);
    }


    public function setWebhook($webhookUrl) {
        return $this->makeRequest('setWebhook', ['url' => $webhookUrl]);
    }

}




