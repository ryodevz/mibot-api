<?php

namespace Ryodevz\MiBot\Apis;

use Ryodevz\HttpfulWrapper\Http;
use Ryodevz\HttpfulWrapper\Mime;
use Ryodevz\MiBot\Config;

class TextMessage extends Config
{
    protected string $path = '/send-message';

    protected string $receiver;

    protected string $message_text;

    public function __construct($receiver, $message_text)
    {
        $this->message_text = $message_text;
        $this->receiver = $receiver;
    }

    public function send()
    {
        $response = Http::post(static::getFullURL($this->path), $this->getParams(), Mime::FORM)
            ->expectsJson()
            ->addHeaders(static::getAuthorizationHeaders())
            ->send()
            ->body;

        return $response;
    }

    private function getParams()
    {
        return [
            'message_type' => 'text',
            'device_id' => static::$device_id,
            'receiver' => $this->receiver,
            'message_text' => $this->message_text,
        ];
    }
}