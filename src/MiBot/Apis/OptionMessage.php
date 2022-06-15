<?php

namespace Ryodevz\MiBot\Apis;

use Ryodevz\Httpwrapper\Http;
use Ryodevz\MiBot\Config;

class OptionMessage extends Config
{
    protected string $path = '/send-message';

    protected string $receiver;

    protected string $message_text;
    
    protected string $option_button_text;
    
    protected string $message_title;

    protected array $option_sections;

    public function __construct($receiver, $message_text, $sections, $button_text, $message_title)
    {
        $this->message_text = $message_text;
        $this->receiver = $receiver;
        $this->option_button_text = $button_text;
        $this->message_title = $message_title;
        $this->option_sections = $sections;
    }

    public function send()
    {
        $response = Http::withHeaders(static::getHeaders())
            ->post(static::getFullURL($this->path), $this->getParams())
            ->send()
            ->body();

        return $response;
    }

    private function getParams()
    {
        return [
            'message_type' => 'option',
            'device_id' => static::$device_id,
            'receiver' => $this->receiver,
            'message_text' => $this->message_text,
            'message_title' => $this->message_title,
            'option_sections' => $this->option_sections,
            'option_button_text' => $this->option_button_text,
        ];
    }
}