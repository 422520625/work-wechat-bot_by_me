<?php

namespace Trigold\WechatBot\MsgType;

interface MsgTypeInterface
{
    public function serialize(): array;

    public function getMsgType(): string;
}
