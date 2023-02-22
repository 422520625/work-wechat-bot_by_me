<?php

namespace Trigold\WechatBot\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use PhpPackagist\WorkWeixinBot\Laravel\Facades\WorkWeixinBot;

class SendBotMsg implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected array $record;
    protected string $bot;

    public function __construct(string $bot, array $record)
    {
        $this->bot = $bot;
        $this->record = $record;
    }

    public function handle()
    {
//        echo '<pre>';print_r($this->record['formatted']);exit();
        try {
            WorkWeixinBot::driver($this->bot)->sendText($this->record['formatted']);
        } catch (GuzzleException $e) {
            info('wechat error msg:'.$e->getMessage());
        }
    }

}
