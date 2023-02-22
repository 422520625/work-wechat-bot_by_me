<?php

namespace Trigold\WechatBot\MsgType;

class Text extends MsgType implements MsgTypeInterface
{
    protected string $content = '';

    protected array $mentionedList;

    protected array $mentionedMobileList;

    public function setContent(string $content): Text
    {
        $this->content = $content;
        return $this;
    }

    public function setMentionedList(array $mentionedList): Text
    {
        $this->mentionedList = $mentionedList;
        return $this;
    }

    public function setMentionedMobileList(array $mentionedMobileList): Text
    {
        $this->mentionedMobileList = $mentionedMobileList;
        return $this;
    }

    public function getMsgType(): string
    {
        return 'text';
    }
}
