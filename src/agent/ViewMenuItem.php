<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/22
 * Time: 12:23
 */

namespace cdcchen\wework\agent;


/**
 * Class ViewMenuItem
 * @package cdcchen\wework\agent
 */
class ViewMenuItem extends MenuItem
{
    public function init()
    {
        parent::init();
        $this->setType(self::TYPE_VIEW);
    }
    
    /**
     * @param string $url
     * @return ViewMenuItem
     */
    public function setUrl(string $url): self
    {
        $this->set('url', $url);
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->get('url');
    }
}