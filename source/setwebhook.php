<?php
require 'telegram.php';

$bot = new Bot();
$webhookUrl = "https://eeeb-92-63-204-107.ngrok-free.app/currency-converter/webhook.php"; 

$response = $bot->setWebhook($webhookUrl);
echo "Webhook response: " . $response;


