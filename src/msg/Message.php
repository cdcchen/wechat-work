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
     * @param int $agentId
     * @return static
     */
    public function setAgentId(int $agentId): self
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
        if ($users = $this->get('touser')) {
            $this->set('touser', $users . '|' . $userId);
        } else {
            $this->set('touser', $userId);
        }

        return $this;
    }

    /**
     * @return array|null
     */
    public function getToUser(): ?array
    {
        if ($users = $this->get('touser')) {
            return explode('|', $users);
        }

        return null;
    }

    /**
     * @param array $partyIds
     * @return static
     */
    public function setToParty(array $partyIds): self
    {
        $this->set('toparty', join('|', $partyIds));
        return $this;
    }

    /**
     * @param string $partyId
     * @return static
     */
    public function appendToParty(string $partyId): self
    {
        if ($partyIds = $this->get('toparty')) {
            $this->set('toparty', $partyIds . '|' . $partyId);
        } else {
            $this->set('toparty', $partyId);
        }

        return $this;
    }

    /**
     * @return array|null
     */
    public function getToParty(): ?array
    {
        if ($party = $this->get('toparty')) {
            return explode('|', $party);
        }

        return null;
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
        if ($tagIds = $this->get('totag')) {
            $this->set('totag', $tagIds . '|' . $tagId);
        } else {
            $this->set('totag', $tagId);
        }

        return $this;
    }

    /**
     * @return array|null
     */
    public function getToTag(): ?array
    {
        if ($tag = $this->get('totag')) {
            return explode('|', $tag);
        }

        return null;
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