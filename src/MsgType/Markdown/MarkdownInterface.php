<?php

namespace Trigold\WechatBot\MsgType\Markdown;

interface MarkdownInterface
{
    public function convert(): string;
}
