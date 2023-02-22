<?php

namespace Trigold\WechatBot\MsgType;

use Trigold\WechatBot\MsgType\Articles\Article;

class News extends MsgType implements MsgTypeInterface
{
    protected array $articles = [];

    public function getMsgType(): string
    {
        return 'news';
    }

    public function addArticle(Article $article): News
    {
        $this->articles[] = $article;
        return $this;
    }
}
