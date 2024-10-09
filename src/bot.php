<?php

require __DIR__ . '/../vendor/autoload.php';

use SergiX44\Nutgram\Nutgram;

$bot = new Nutgram('YOUR TOKEN');


$bot->onCommand('start', function (Nutgram $bot) {
    $chatType = $bot->message()->chat->type->value;
    $user = $bot->message()->from;
    $username = $user->username ? '@' . $user->username : 'незнакомец';

    if ($chatType === 'private') {
        $bot->sendMessage("Добро пожаловать, $username! Напишите мне что-нибудь, и я повторю это.");
    } else {
        $bot->sendMessage("Этот бот работает только в личных сообщениях.");
    }
});

$bot->onCommand('joke', function (Nutgram $bot) {
    $jokes = [
        'Почему программисты не ходят в лес? Потому что они боятся «зациклиться»!',
        'Что сказал сервер базе данных? "Ты выглядишь подавленно".',
        'Почему программисты не могут завести семью? Потому что не могут найти вторую половинку!',
    ];
    $randomJoke = $jokes[array_rand($jokes)];
    $bot->sendMessage($randomJoke);
});

$bot->onMessage(function (Nutgram $bot) {
    if (!$bot->message()->text || $bot->message()->text[0] !== '/') {
        $messageText = $bot->message()->text;
        $bot->sendMessage("Вы написали: $messageText");
    }
});

$bot->run();
