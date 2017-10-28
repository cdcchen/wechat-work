<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 13:56
 */

namespace cdcchen\wework\msg;


/**
 * Class ImageMessage
 * @package cdcchen\wework\msg
 */
class ImageMessage extends Message
{
    /**
     * @inheritdoc
     */
    protected function init()
    {
        parent::init();
        $this->setMsgType(self::TYPE_IMAGE);
    }

    /**
     * @param string $mediaId
     * @return ImageMessage
     */
    public function setMediaId(string $mediaId): self
    {
        $this->set('image', ['media_id' => $mediaId]);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getMediaId(): ?string
    {
        if (($media = $this->get('image')) && is_array($media)) {
            return $media['media_id'];
        }

        return null;
    }
}