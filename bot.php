<?php
$token = '5241166842:AAH6o9RYiUp6pyWONJ0f8ZnZLX02Ty0Vw5A';
$website = 'https://api.telegram.org/bot'.$token;

$input = file_get_contents('php://input');
$update = json_decode($input, TRUE);

$chatId = $update['message']['chat']['id'];
$message = $update['message']['text'];

switch($message) {
    case '/start':
        $response = 'Me has iniciado';
        sendMessage($chatId, $response);
        break;
    case '/info':
        $response = 'Hola! Soy el bot del @PAEBanes_bot';
        sendMessage($chatId, $response);
        break;
    default:
        $response = 'No te he entendido';
        sendMessage($chatId, $response);
        break;
}

function sendMessage($chatId, $response) {
    $url = $GLOBALS['website'].'/sendMessage?chat_id='.$chatId.'&parse_mode=HTML&text='.urlencode($response);
    file_get_contents($url);
}
?>
