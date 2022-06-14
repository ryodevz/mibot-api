<?php

namespace Ryodevz\MiBot;

use Ryodevz\MiBot\Apis\ButtonMessage;
use Ryodevz\MiBot\Apis\OptionMessage;
use Ryodevz\MiBot\Apis\TextMessage;

class Api
{
    public static function textMessage(string $receiver_phone_number, string $message_text)
    {
        return new TextMessage($receiver_phone_number, $message_text);
    }

    public static function buttonMessage(string $receiver_phone_number, string $message_text, array $buttons)
    {
        return new ButtonMessage($receiver_phone_number, $message_text, $buttons);
    }

    public static function optionMessage(string $receiver_phone_number, string $message_text, array $sections, string $button_text, string $message_title)
    {
        return new OptionMessage($receiver_phone_number, $message_text, $sections, $button_text, $message_title);
    }
}