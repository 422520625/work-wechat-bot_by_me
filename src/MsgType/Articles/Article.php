<?php

namespace Trigold\WechatBot\MsgType\Articles;

class Article
{
    protected string $title = '';

    protected string $description = '';

    protected string $url = '';

    protected string $picUrl = '';

    public function title(string $title): Article
    {
        $this->title = $title;
        return $this;
    }

    public function description(string $description): Article
    {
        $this->description = $description;
        return $this;
    }

    public function url(string $url): Article
    {
        $this->url = $url;
        return $this;
    }

    public function picUrl(string $picUrl): Article
    {
        $this->picUrl = $picUrl;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'url' => $this->url,
            'picurl' => $this->picUrl,
        ];
    }
}
