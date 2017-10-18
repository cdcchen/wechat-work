<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 13:23
 */

namespace cdcchen\wework\msg;


use cdcchen\wework\base\AttributeArray;

class Message extends AttributeArray
{
    const TYPE_TEXT      = 'text';
    const TYPE_IMAGE     = 'image';
    const TYPE_VOICE     = 'voice';
    const TYPE_VIDEO     = 'video';
    const TYPE_FILE      = 'file';
    const TYPE_TEXT_CARD = 'textcard';
    const TYPE_NEWS      = 'news';
    const TYPE_MPNEWS    = 'mpnews';

    /**
     * @param string $agentId
     * @return static
     */
    public function setAgentId(string $agentId): self
    {
        $this->set('agentid', $agentId);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAgentId(): ?string
    {
        return $this->get('agentid');
    }

    /**
     * @param array $userIds
     * @return static
     */
    public function setToUser(array $userIds): self
    {
        $this->set('touser', join('|', $userIds));
        return $this;
    }

    /**
     * @param string $userId
     * @return static
     */
    public function appendToUser(string $userId): self
    {
        $this->append('touser', $userId);
        return $this;
    }

    /**
     * @return array|null
     */
    public function getToUser(): ?array
    {
        return $this->get('touser');
    }

    /**
     * @param array $departIds
     * @return static
     */
    public function setToDepart(array $departIds): self
    {
        $this->set('toparty', join('|', $departIds));
        return $this;
    }

    /**
     * @param string $departId
     * @return static
     */
    public function appendToDepart(string $departId): self
    {
        $this->append('toparty', $departId);
        return $this;
    }

    /**
     * @return array|null
     */
    public function getToDepart(): ?array
    {
        return $this->get('toparty');
    }

    /**
     * @param array $tagIds
     * @return static
     */
    public function setToTag(array $tagIds): self
    {
        $this->set('totag', join('|', $tagIds));
        return $this;
    }

    /**
     * @param string $tagId
     * @return static
     */
    public function appendToTag(string $tagId): self
    {
        $this->append('totag', $tagId);
        return $this;
    }

    /**
     * @return array|null
     */
    public function getToTag(): ?array
    {
        return $this->get('totag');
    }

    /**
     * @param string $type
     * @return static
     */
    public function setMsgType(string $type): self
    {
        $this->set('msgtype', $type);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getMsgType(): ?string
    {
        return $this->get('msgtype');
    }

    /**
     * @param bool $safe
     * @return static
     */
    public function setSafe(bool $safe): self
    {
        $this->set('safe', (int)$safe);
        return $this;
    }

    /**
     * @return int
     */
    public function getSafe(): int
    {
        return (int)$this->get('safe');
    }
}