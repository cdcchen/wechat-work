<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 13:56
 */

namespace cdcchen\wework\msg;


class VoiceMessage extends Message
{
    protected function init()
    {
        parent::init();
        $this->setMsgType(self::TYPE_VOICE);
    }

    public function setMediaId(string $mediaId): self
    {
        $this->set('voice', ['media_id' => $mediaId]);
        return $this;
    }

    public function getMediaId(): ?string
    {
        if (($text = $this->get('voice')) && is_array($text)) {
            return $text['media_id'];
        }

        return null;
    }
}