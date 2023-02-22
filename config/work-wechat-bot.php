<?php
return [
    'default' => 'default',

    'drivers' => [
        'default' => [
            'key'   => env('WORK_WECHAT_BOT_KEY', ''),
            'queue' => env('WORK_WECHAT_BOT_QUEUE', 'work-wechat-bot-queue'),
        ],

        'another' => [
            'key'   => env('WORK_WECHAT_BOT_KEY', ''),
            'queue' => env('WORK_WECHAT_BOT_QUEUE', 'work-wechat-bot-queue'),
        ],
    ],
];
