<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/22
 * Time: 11:19
 */

namespace cdcchen\wework\media;


use cdcchen\wework\base\BaseClient;
use Psr\Http\Message\StreamInterface;

/**
 * Class MediaClient
 * @package cdcchen\wework\media
 */
class MediaClient extends BaseClient
{
    /**
     * @param string $mediaId
     * @return StreamInterface
     */
    public function get(string $mediaId): StreamInterface
    {
        return $this->send((new GetMediaRequest())->setMediaId($mediaId));
    }

    /**
     * @param string $type
     * @param string $filename
     * @return array
     */
    public function upload(string $type, string $filename): array
    {
        $request = (new UploadMediaRequest())->setType($type)->setMedia($filename);
        return $this->send($request);
    }

    /**
     * @param string $filename
     * @return array
     */
    public function uploadFile(string $filename): array
    {
        return $this->upload(MediaType::FILE, $filename);
    }

    /**
     * @param string $filename
     * @return array
     */
    public function uploadImage(string $filename): array
    {
        return $this->upload(MediaType::IMAGE, $filename);
    }

    /**
     * @param string $filename
     * @return array
     */
    public function uploadVoice(string $filename): array
    {
        return $this->upload(MediaType::VOICE, $filename);
    }

    /**
     * @param string $filename
     * @return array
     */
    public function uploadVideo(string $filename): array
    {
        return $this->upload(MediaType::VIDEO, $filename);
    }
}
