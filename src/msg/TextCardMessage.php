<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 13:56
 */

namespace cdcchen\wework\msg;


class TextCardMessage extends Message
{
    protected function init()
    {
        parent::init();
        $this->setMsgType(self::TYPE_TEXT_CARD);
    }

    public function setCard(TextCard $card): self
    {
        $this->set('textcard', $card);
        return $this;
    }

    public function getCard(): ?TextCard
    {
        return $this->get('textcard');
    }
}