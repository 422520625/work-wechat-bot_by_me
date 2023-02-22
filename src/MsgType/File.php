<?php

namespace Trigold\WechatBot\MsgType;

class File extends MsgType implements MsgTypeInterface
{
    protected string $mediaId = '';

    public function getMsgType(): string
    {
        return 'file';
    }

    public function setMediaId(string $mediaId): File
    {
        $this->mediaId = $mediaId;
        return $this;
    }

}
