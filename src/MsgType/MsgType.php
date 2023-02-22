<?php

namespace Trigold\WechatBot\MsgType;

use ReflectionClass;
use Illuminate\Support\Str;
use Trigold\WechatBot\MsgType\Markdown\MarkdownInterface;

class MsgType
{

    public function serialize(): array
    {
        return $this->objSerialize($this);
    }

    public function objSerialize($obj): array
    {
        $memberRet = [];
        $ref = new ReflectionClass($obj);
        $memberList = $ref->getProperties();

        foreach ($memberList as $member) {
            $name = $member->getName();
            $member->setAccessible(true);

            $value = $member->getValue($obj);

            if ($value === null) {
                continue;
            }
            $name = Str::snake($name);
            if (is_object($value)) {
                $memberRet[$name] = $this->objSerialize($value);
            }  elseif (is_array($value)) {
                $memberRet[$name] = $this->arraySerialize($value);
            } elseif ($value) {
                $memberRet[$name] = $value;
            }
        }
        return $memberRet;
    }

    protected function arraySerialize(array $memberList): array
    {
        $memberRet = [];
        foreach ($memberList as $name => $value) {
            if ($value === null) {
                continue;
            }
            if (is_object($value)) {
                $memberRet[$name] = $this->objSerialize($value);
            } elseif (is_array($value)) {
                $memberRet[$name] = $this->arraySerialize($value);
            } else {
                $memberRet[$name] = $value;
            }
        }
        return $memberRet;
    }
}
