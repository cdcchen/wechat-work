<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 14:58
 */

namespace cdcchen\wework\msg;


use cdcchen\wework\base\AttributeArray;

/**
 * Class MPNewsArticle
 * @package cdcchen\wework\msg
 */
class MPNewsArticle extends AttributeArray
{
    /**
     * @param string $title
     * @return static
     */
    public function setTitle(string $title): self
    {
        $this->set('title', $title);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->get('title');
    }

    /**
     * @param string $mediaId
     * @return static
     */
    public function setThumbMediaId(string $mediaId): self
    {
        $this->set('thumb_media_id', $mediaId);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getThumbMediaId(): ?string
    {
        return $this->get('thumb_media_id');
    }

    /**
     * @param string $url
     * @return static
     */
    public function setContentSourceUrl(string $url): self
    {
        $this->set('content_source_url', $url);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getContentSourceUrl(): ?string
    {
        return $this->get('content_source_url');
    }

    /**
     * @param string $author
     * @return static
     */
    public function setAuthor(string $author): self
    {
        $this->set('author', $author);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAuthor(): ?string
    {
        return $this->get('author');
    }

    /**
     * @param string $text
     * @return static
     */
    public function setContent(string $text): self
    {
        $this->set('content', $text);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getContent(): ?string
    {
        return $this->get('content');
    }

    /**
     * @param string $text
     * @return static
     */
    public function setDigest(string $text): self
    {
        $this->set('digest', $text);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDigest(): ?string
    {
        return $this->get('digest');
    }
}