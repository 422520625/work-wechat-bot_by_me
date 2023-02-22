<?php

namespace Trigold\WechatBot\MsgType;

class TemplateCard extends MsgType implements MsgTypeInterface
{
    protected string $title = '';

    protected string $description = '';

    protected string $url = '';

    protected string $btntxt = '';

    public function getMsgType(): string
    {
        return 'template_card';
    }

    public function title(string $title): TemplateCard
    {
        $this->title = $title;
        return $this;
    }

    public function description(string $description): TemplateCard
    {
        $this->description = $description;
        return $this;
    }

    public function url(string $url): TemplateCard
    {
        $this->url = $url;
        return $this;
    }

    public function btntxt(string $btntxt): TemplateCard
    {
        $this->btntxt = $btntxt;
        return $this;
    }
}
