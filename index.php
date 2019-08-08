<?php
require_once('./vendor/autoload.php');
// Namespace
use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot;
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;
$channel_token =
'nTC2UeSxRWc6mjsGeTT45KZTf5KxqJ7X2FQwxiwuIkR3QnhifYsMDLSxTorlL5WRzWezaT4JlooQyxOMgfvNO09AKHNqG4A1HPpbhElONM7UbgO0hIPZItgc5GSsHpUxxce2KwwpRgPfipfOZXLX5gdB04t89/1O/w1cDnyilFU=';
$channel_secret = 'aaa41ae5ff25622870f3aca21f4deed9';
// Get message from Line API
$content = file_get_contents('php://input');
$events = json_decode($content, true);
if (!is_null($events['events'])) {
// Loop through each event
foreach ($events['events'] as $event) {
// Line API send a lot of event type, we interested in message only.
if ($event['type'] == 'message') {
 switch($event['message']['type']) {
case 'text':
 // Get replyToken
 $replyToken = $event['replyToken'];
 // Reply message
 $respMessage = 'Hello, your message is '. $event['message']['text'];
 $httpClient = new CurlHTTPClient($channel_token);
 $bot = new LINEBot($httpClient, array('channelSecret' => $channel_secret));
 $textMessageBuilder = new TextMessageBuilder($respMessage);
 $response = $bot->replyMessage($replyToken, $textMessageBuilder);
break;
}
}
}
}
echo "OK";
