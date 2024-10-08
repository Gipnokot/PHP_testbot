<?php

require __DIR__ . '/../vendor/autoload.php';

use SergiX44\Nutgram\Nutgram;

$bot = new Nutgram('7939743955:AAFiNEUy2rfy0KeOoICr9gxW3284NnSI45s');


$bot->onCommand('start', function (Nutgram $bot) {
    $chatType = $bot->message()->chat->type->value;

    if ($chatType === 'private') {
        $bot->sendMessage("Добро пожаловать в бота! Напишите мне что-нибудь, и я повторю это.");
    } else {
        $bot->sendMessage("Этот бот работает только в личных сообщениях.");
    }
});

$bot->onMessage(function (Nutgram $bot) {
    $messageText = $bot->message()->text;
    $bot->sendMessage("Вы написали: $messageText");
});

$bot->run();
