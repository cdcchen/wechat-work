<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 13:56
 */

namespace cdcchen\wework\msg;


class ImageMessage extends Message
{
    protected function init()
    {
        parent::init();
        $this->setMsgType(self::TYPE_IMAGE);
    }

    public function setMediaId(string $mediaId): self
    {
        $this->set('image', ['media_id' => $mediaId]);
        return $this;
    }

    public function getMediaId(): ?string
    {
        if (($media = $this->get('image')) && is_array($media)) {
            return $media['media_id'];
        }

        return null;
    }
}