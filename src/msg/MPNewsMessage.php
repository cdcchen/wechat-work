<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 15:11
 */

namespace cdcchen\wework\msg;


class MPNewsMessage extends Message
{
    protected function init()
    {
        parent::init();
        $this->setMsgType(self::TYPE_MPNEWS);
    }

    /**
     * @param array $articles
     * @return static
     */
    public function setArticles(array $articles): self
    {
        $this->set('mpnews', ['articles' => $articles]);
        return $this;
    }

    public function getArticles(): ?array
    {
        if (($media = $this->get('mpnews'))) {
            return $media['articles'];
        }

        return null;
    }
}