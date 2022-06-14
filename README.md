## MiBot API Wrapper
MIBot API wrapper for ease of use.
### Installation
```bash
composer require ryodevz/mibot-api
```
### Configuration
```php
<?php

use Ryodevz\MiBot\Config;

// API Token
Config::setApiToken('6|Rjr8x0nuGRm9BwZLm5AwywmNP8O5N9rZZ7uyWw5J');

// Device ID
Config::setDevice('6287743985629');
```

### Send Text Message
```php
<?php

use Ryodevz\MiBot\Api;

$receiver = '6287999999999';
$message_text = 'Hello World'

$response = Api::textMessage($receiver, $message_text)->send();

var_dump($response);

```

### Send Button Message
```php
<?php

use Ryodevz\MiBot\Api;

$receiver = '6287999999999';
$message_text = 'Hello World'

$buttons = [
    [
        'type' => 'reply',
        'text' => 'Information',
        'command' => 'info',
    ],
    [
        'type' => 'url',
        'text' => 'Website',
        'url' => 'https://profile.ytryo.my.id',
    ],
    [
        'type' => 'phone',
        'text' => 'Contact Me',
        'phone' => '6281917999999',
    ],
]

$response = Api::buttonMessage($receiver, $message_text, $buttons)->send();

var_dump($response);
```

### Send Option Message

```php
<?php

use Ryodevz\MiBot\Api;

$receiver = '6287999999999';
$message_text = 'Hello World';
$button_text = 'Button Text';
$message_title = 'Naruto Shippuded';

$sections = [
    [
        'title' => 'Section 1 title',
        'rows' => [
            [
                'title' => 'Episode 1',
                'command' => 'eps_1',
            ],
            [
                'title' => 'Episode 2',
                'command' => 'eps_2',
            ],
            [
                'title' => 'Episode 3',
                'command' => 'eps_3',
            ],
        ]
    ],
    [
        'title' => 'Section 2 title',
        'rows' => [
            [
                'title' => 'Episode 4',
                'command' => 'eps_4',
            ],
        ]
    ],
];

$response = Api::optionMessage($receiver, $message_text, $sections, $button_text, $message_title)->send();

var_dump($response);
```