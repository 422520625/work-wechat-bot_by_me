<?php

namespace Trigold\WechatBot;

use Illuminate\Support\Facades\Http;
use \Illuminate\Http\Client\Response;
use Trigold\WechatBot\MsgType\MsgTypeInterface;

class Bot
{
    /**
     * @var string
     */
    public const API_SEND = 'https://qyapi.weixin.qq.com/cgi-bin/webhook/send?key=%s';

    protected $config;

    /**
     * @param  array  $config
     */
    public function __construct(array $config = [])
    {
        $this->config = array_merge($this->config, $config);
    }

    public function send(MsgTypeInterface $msg): Response
    {
        $data = $this->buildData($msg);
        return $this->sendRaw($data);
    }

    /**
     * send raw message.
     *
     * @param  array  $params
     *
     * @return Response
     */
    public function sendRaw(array $params = []): Response
    {
        return Http::post(sprintf(self::API_SEND, $this->config['key']), $params);
    }

    protected function buildData(MsgTypeInterface $msg): array
    {
        return [
            'msgtype'          => $msg->getMsgType(),
            $msg->getMsgType() => $msg->serialize(),
        ];
    }
}
