<?php

namespace Trigold\WechatBot;

use InvalidArgumentException;
use Illuminate\Support\Manager;

class WechatManager extends Manager
{

    protected function createDriver($driver)
    {
        if (isset($this->customCreators[$driver])) {
            return $this->callCustomCreator($driver);
        }
        return $this->createBotDriver($driver);
    }

    public function getDefaultDriver()
    {
        return $this->config->get('work-wechat-bot.default');
    }

    protected function createBotDriver(string $driver): Bot
    {
        $config = $this->config->get('work-wechat-bot.drivers.'.$driver);

        if (is_null($config)) {
            throw new InvalidArgumentException(sprintf('Unable to resolve NULL driver for [%s].', static::class));
        }

        return new Bot($config);
    }
}
