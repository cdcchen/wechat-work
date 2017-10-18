<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 13:56
 */

namespace cdcchen\wework\msg;


class VideoMessage extends Message
{
    protected function init()
    {
        parent::init();
        $this->setMsgType(self::TYPE_VIDEO);
    }

    public function setVideo(string $mediaId, string $title = null, string $description = null): self
    {
        $video = ['media_id' => $mediaId];
        if ($title !== null) {
            $video['title'] = $title;
        }
        if ($title !== null) {
            $video['description'] = $description;
        }

        $this->set('video', $video);
        return $this;
    }

    public function getVideo(): ?array
    {
        return $this->get('video');
    }

    public function getMediaId(): ?string
    {
        if (($media = $this->get('video'))) {
            return $media['media_id'];
        }

        return null;
    }

    public function getTitle(): ?string
    {
        if (($media = $this->get('video'))) {
            return $media['title'];
        }

        return null;
    }

    public function getDescription(): ?string
    {
        if (($media = $this->get('video'))) {
            return $media['description'];
        }

        return null;
    }
}