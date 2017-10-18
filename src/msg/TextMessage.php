<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 13:53
 */

namespace cdcchen\wework\msg;


class TextMessage extends Message
{
    protected function init()
    {
        parent::init();
        $this->setMsgType(self::TYPE_TEXT);
    }

    public function setContent(string $content): self
    {
        $this->set('text', ['content' => $content]);
        return $this;
    }

    public function getContent(): ?string
    {
        if (($text = $this->get('text')) && is_array($text)) {
            return $text['content'];
        }

        return null;
    }
}