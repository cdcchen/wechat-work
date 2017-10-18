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
     * @return NewsMessage
     */
    public function setArticles(array $articles): self
    {
        foreach ($articles as $index => $article) {
            if ($article instanceof NewsArticle) {
                $articles[$index] = $article->toArray();
            }
        }
        $this->set('news', ['articles' => $articles]);

        return $this;
    }

    public function getArticles(): ?array
    {
        if (($media = $this->get('news'))) {
            return $media['articles'];
        }

        return null;
    }
}