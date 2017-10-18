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