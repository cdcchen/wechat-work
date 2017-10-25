<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/22
 * Time: 12:24
 */

namespace cdcchen\wework\agent;


/**
 * Class EventMenuItem
 * @package cdcchen\wework\agent
 */
class EventMenuItem extends MenuItem
{
    /**
     * @param string $key
     * @return EventMenuItem
     */
    public function setKey(string $key): self
    {
        $this->set('key', $key);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getKey(): ?string
    {
        return $this->get('key');
    }
}