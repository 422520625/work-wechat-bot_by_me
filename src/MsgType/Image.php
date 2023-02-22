<?php

namespace Trigold\WechatBot\MsgType;

class Image extends MsgType implements MsgTypeInterface
{
    protected string $base64 = '';
    protected string $md5 = '';

    public function __construct(string $file_path)
    {
        if (!is_dir($file_path)) {
            throw new \Exception('File path is not a file');
        }
        $this->base64 = base64_encode(file_get_contents($file_path));
        $this->md5 = md5_file($file_path);
    }

    public function getMsgType(): string
    {
        return 'image';
    }
}
