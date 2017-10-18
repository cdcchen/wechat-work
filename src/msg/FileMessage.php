<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 13:56
 */

namespace cdcchen\wework\msg;


class FileMessage extends Message
{
    protected function init()
    {
        parent::init();
        $this->setMsgType(self::TYPE_FILE);
    }

    public function setMediaId(string $mediaId): self
    {
        $this->set('file', ['media_id' => $mediaId]);
        return $this;
    }

    public function getMediaId(): ?string
    {
        if (($media = $this->get('file')) && is_array($media)) {
            return $media['media_id'];
        }

        return null;
    }
}