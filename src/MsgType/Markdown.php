<?php

namespace Trigold\WechatBot\MsgType;

use Trigold\WechatBot\MsgType\Markdown\MarkdownInterface;

class Markdown extends MsgType implements MsgTypeInterface
{
    protected string $content = '';

    public function getMsgType(): string
    {
        return 'markdown';
    }

    public function addContent(MarkdownInterface $content): Markdown
    {
        $this->content .= $content->convert();
        return $this;
    }
}
