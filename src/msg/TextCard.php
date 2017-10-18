<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 17:46
 */

namespace cdcchen\wework\msg;


use cdcchen\wework\base\AttributeArray;

/**
 * Class TextCard
 * @package cdcchen\wework\msg
 */
class TextCard extends AttributeArray
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
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->get('description');
    }

    /**
     * @param string $description
     * @return static
     */
    public function setDescription(string $description): self
    {
        $this->set('description', $description);
        return $this;
    }

    /**
     * @param string $url
     * @return static
     */
    public function setUrl(string $url): self
    {
        $this->set('url', $url);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getUrl(): ?string
    {
        return $this->get('url');
    }

    /**
     * @param string $text
     * @return static
     */
    public function setBtnText(string $text): self
    {
        $this->set('btntxt', $text);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getBtnText(): ?string
    {
        return $this->get('btntxt');
    }
}