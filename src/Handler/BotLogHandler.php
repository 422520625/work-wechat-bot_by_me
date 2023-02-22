<?php
namespace Trigold\WechatBot\Handler;

use Monolog\Logger;
use Monolog\Handler\HandlerInterface;
use Trigold\WechatBot\Jobs\SendBotMsg;
use Monolog\Formatter\FormatterInterface;
use Monolog\Handler\AbstractProcessingHandler;
use Trigold\WechatBot\Formatter\BotLogFormatter;

class BotLogHandler extends AbstractProcessingHandler
{
    protected string $bot;

    public function __construct(string $bot,$level = Logger::DEBUG, bool $bubble = true)
    {
        $this->bot = $bot;
        parent::__construct($level, $bubble);
    }

    protected function write(array $record): void
    {
        SendBotMsg::dispatch($this->bot,$record);
    }

    public function setFormatter(FormatterInterface $formatter): HandlerInterface
    {
        if ($formatter instanceof BotLogFormatter) {
            return parent::setFormatter($formatter);
        }
    }
}
