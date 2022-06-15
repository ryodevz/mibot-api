<?php

namespace Ryodevz\MiBot;

class Config
{
    protected static string $url = 'https://ytryo.my.id/api';
    
    protected static string $apiToken = '';
    
    protected static string $device_id = '';

    public static function setApiToken(string $apiToken)
    {
        static::$apiToken = $apiToken;

        return true;
    }

    public static function setDevice(string $device_id)
    {
        static::$device_id = $device_id;

        return true;
    }

    protected static function getFullURL(string $path)
    {
        return static::$url . $path;
    }

    protected static function getHeaders()
    {
        return [
            'Authorization' => 'Bearer ' . static::$apiToken
        ];
    }
}