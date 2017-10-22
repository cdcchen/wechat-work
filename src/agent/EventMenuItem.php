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
     * @param string $url
     * @return EventMenuItem
     */
    public function setKey(string $url): self
    {
        $this->set('key', $url);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getUrl(): ?string
    {
        return $this->get('key');
    }
}