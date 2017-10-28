<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 14:42
 */

namespace cdcchen\wework\msg;


use cdcchen\wework\base\AttributeArray;

class NewsArticle extends AttributeArray
{
    /**
     * @param string $title
     * @param string $description
     * @param string $url
     * @param string|null $picUrl
     * @param string|null $btnText
     * @return NewsArticle
     */
    public function setDetail(
        string $title,
        string $description,
        string $url,
        string $picUrl = null,
        string $btnText = null
    ): self {
        $this->set('title', $title);
        $this->set('description', $description);
        $this->set('url', $url);

        if (!empty($picUrl)) {
            $this->set('picurl', $picUrl);
        }
        if (!empty($btnText)) {
            $this->set('btntxt', $btnText);
        }

        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->set('title', $title);
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->get('title');
    }

    public function setDescription(string $description): self
    {
        $this->set('description', $description);
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->get('description');
    }

    public function setUrl(string $url): self
    {
        $this->set('url', $url);
        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->get('url');
    }

    public function getPicUrl(): ?string
    {
        return $this->get('picurl');
    }

    public function setPicUrl(string $url): self
    {
        $this->set('picurl', $url);
        return $this;
    }

    public function setBtnText(string $text): self
    {
        $this->set('btntxt', $text);
        return $this;
    }

    public function getBtnText(): ?string
    {
        return $this->get('btntxt');
    }
}