<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/22
 * Time: 20:18
 */

namespace cdcchen\wework\cb;


use cdcchen\wework\base\AttributeArray;

/**
 * Class PushMessage
 * @package cdcchen\wework\cb
 */
class PushMessage extends AttributeArray
{
    const TYPE_TEXT     = 'text';
    const TYPE_IMAGE    = 'image';
    const TYPE_VOICE    = 'voice';
    const TYPE_VIDEO    = 'video';
    const TYPE_LOCATION = 'location';
    const TYPE_LINK     = 'link';
    const TYPE_EVENT    = 'event';

    /**
     * @return bool
     */
    public function isText(): bool
    {
        return $this->getMsgType() === self::TYPE_TEXT;
    }

    /**
     * @return bool
     */
    public function isImage(): bool
    {
        return $this->getMsgType() === self::TYPE_IMAGE;
    }

    /**
     * @return bool
     */
    public function isVoice(): bool
    {
        return $this->getMsgType() === self::TYPE_VOICE;
    }

    /**
     * @return bool
     */
    public function isVideo(): bool
    {
        return $this->getMsgType() === self::TYPE_VIDEO;
    }

    /**
     * @return bool
     */
    public function isLocation(): bool
    {
        return $this->getMsgType() === self::TYPE_LOCATION;
    }

    /**
     * @return bool
     */
    public function isLink(): bool
    {
        return $this->getMsgType() === self::TYPE_LINK;
    }

    /**
     * @return bool
     */
    public function isEvent(): bool
    {
        return $this->getMsgType() === self::TYPE_EVENT;
    }

    /**
     * @return null|string
     */
    public function getAgentId(): ?string
    {
        return $this->get('AgentID');
    }

    /**
     * @return string
     */
    public function getFromUserName(): string
    {
        return $this->get('FromUserName');
    }

    /**
     * @return string
     */
    public function getToUserName(): string
    {
        return $this->get('ToUserName');
    }

    /**
     * @return null|string
     */
    public function getCreateTime(): ?string
    {
        return $this->get('CreateTime');
    }

    /**
     * @return string
     */
    public function getMsgType(): string
    {
        return $this->get('MsgType');
    }

    /**
     * @return null|string
     */
    public function getEvent(): ?string
    {
        return $this->get('Event');
    }
}
