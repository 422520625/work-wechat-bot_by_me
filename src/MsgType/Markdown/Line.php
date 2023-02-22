<?php

namespace Trigold\WechatBot\MsgType\Markdown;

class Line implements MarkdownInterface
{
    const LEVEL_1 = 1;
    const LEVEL_2 = 2;
    const LEVEL_3 = 3;
    const LEVEL_4 = 4;
    const LEVEL_5 = 5;
    const LEVEL_6 = 6;

    const LINK = 1;
    const CODE = 2;
    const QUOTE = 3;
    const COLOR = 4;
    const BOLD = 5;
    const TITLE = 6;

    const COLOR_INFO = 'info';
    const COLOR_COMMENT = 'comment';
    const COLOR_WARNING = 'warning';

    protected array $format = [];

    protected string $text = '';

    public function text(string $text): Line
    {
        $this->text .= $text;
        return $this;
    }

    public function link($link): Line
    {
        $this->format[self::LINK] = $link;
        return $this;
    }

    public function code($code): Line
    {
        $this->format[self::CODE] = $code;
        return $this;
    }

    public function quote($quote): Line
    {
        $this->format[self::QUOTE] = $quote;
        return $this;
    }

    public function color(string $color = self::COLOR_INFO): Line
    {
        $this->format[self::COLOR] = $color;
        return $this;
    }

    public function bold(string $bold): self
    {
        $this->format[self::BOLD] = null;
        return $this;
    }


    public function title(int $level = self::LEVEL_1): Line
    {
        $this->format[self::TITLE] = $level;
        return $this;
    }


    public function convert(): string
    {
        $line = $this->text;
        ksort($this->format);
        foreach ($this->format as $type => $value) {
            switch ($type) {
                case self::LINK:
                    $line .= "[{$line}]({$value})";
                    break;
                case self::CODE:
                    $line .= "`{$line}`";
                    break;
                case self::QUOTE:
                    $line .= "> {$line}";
                    break;
                case self::COLOR:
                    $line .= "<font color=\"{$value}\">({$line})</font>";
                    break;
                case self::BOLD:
                    $line .= "**{$this->text}**";
                    break;
                case self::TITLE:
                    $line .= str_repeat('#', $value).' '.$line;
                    break;
            }
        }
        return $line.PHP_EOL;
    }
}
