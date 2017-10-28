<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 13:56
 */

namespace cdcchen\wework\msg;


class NewsMessage extends Message
{
    protected function init()
    {
        parent::init();
        $this->setMsgType(self::TYPE_NEWS);
    }

    /**
     * @param array $articles
     * @return static
     */
    public function setArticles(array $articles): self
    {
        $this->set('news', ['articles' => $articles]);
        return $this;
    }

    /**
     * @return array|null
     */
    public function getArticles(): ?array
    {
        if (($media = $this->get('news'))) {
            return $media['articles'];
        }

        return null;
    }
}