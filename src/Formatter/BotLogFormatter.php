<?php

namespace Trigold\WechatBot\Formatter;

use Monolog\Formatter\NormalizerFormatter;

class BotLogFormatter extends NormalizerFormatter
{
    public function __construct(?string $dateFormat = null)
    {
        $dateFormat = $dateFormat ?: 'Y-m-d H:i:s';
        parent::__construct($dateFormat);
    }

    public function format(array $record)
    {
        return $this->formatRecord(parent::format($record));
    }

    protected function formatRecord($record): string
    {
        $data = '';
        foreach ($record as $key => $value) {
            if (is_array($value)) {
                $data .= $this->formatRecord($value);
            } else if (is_string($value)) {
                $data .= $this->formatValue($key, $value);
            }
        }
        return $data;
    }

    protected function formatValue($key, $value): string
    {
        return sprintf("[%s]:%s\n", strtoupper($key), $value);
    }
}
