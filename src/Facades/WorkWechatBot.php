<?php

namespace Trigold\WechatBot\Facades;

use Illuminate\Support\Facades\Facade;
use Trigold\WechatBot\MsgType\MsgTypeInterface;

/**
 * @method static  \Trigold\WechatBot\Bot driver(string $driver = null)
 * @method static  \Illuminate\Http\Client\Response send(MsgTypeInterface $msg):Response
 */
class WorkWechatBot extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'work-wechat-bot';
    }
}
