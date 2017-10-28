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
     * @param string $thumbMediaId
     * @param string $content
     * @param string|null $digest
     * @param string|null $contentSourceUrl
     * @param string|null $author
     * @return static
     */
    public function setDetail(
        string $title,
        string $thumbMediaId,
        string $content,
        string $digest = null,
        string $contentSourceUrl = null,
        string $author = null
    ): self {
        $this->set('title', $title);
        $this->set('thumb_media_id', $thumbMediaId);
        $this->set('content', $content);

        if (!empty($digest)) {
            $this->set('digest', $digest);
        }
        if (!empty($contentSourceUrl)) {
            $this->set('content_source_url', $contentSourceUrl);
        }
        if (!empty($author)) {
            $this->set('author', $author);
        }

        return $this;
    }

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