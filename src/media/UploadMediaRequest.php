<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/19
 * Time: 12:06
 */

namespace cdcchen\wework\media;


use cdcchen\http\HttpResponse;
use cdcchen\psr7\FormDataPart;
use cdcchen\psr7\MultipartStream;
use cdcchen\psr7\Stream;
use cdcchen\wework\base\BaseRequest;
use Fig\Http\Message\RequestMethodInterface;

/**
 * Class UploadMediaRequest
 * @package cdcchen\wework\media
 */
class UploadMediaRequest extends BaseRequest
{
    /**
     * @var string
     */
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/media/upload';
    /**
     * @var string
     */
    protected $method = RequestMethodInterface::METHOD_POST;
    /**
     * @var string
     */
    protected $format = '';

    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): self
    {
        $this->queryParams->set('type', $type);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->queryParams->get('type');
    }

    /**
     * @param string $filename
     * @return static
     */
    public function setMedia(string $filename): self
    {
        $stream = new Stream(fopen($filename, 'rb'));
        $this->body = new MultipartStream([new FormDataPart('media', $stream, basename($filename))]);
        return $this;
    }

    /**
     * @param string $filename
     * @return static
     */
    public function setFile(string $filename): self
    {
        return $this->setType(MediaType::FILE)->setMedia($filename);
    }

    /**
     * @param string $filename
     * @return static
     */
    public function setImage(string $filename): self
    {
        return $this->setType(MediaType::IMAGE)->setMedia($filename);
    }

    /**
     * @param string $filename
     * @return static
     */
    public function setVoice(string $filename): self
    {
        return $this->setType(MediaType::VOICE)->setMedia($filename);
    }

    /**
     * @param string $filename
     * @return static
     */
    public function setVideo(string $filename): self
    {
        return $this->setType(MediaType::VIDEO)->setMedia($filename);
    }

    /**
     * @param HttpResponse $response
     * @return array
     */
    protected function handleResponse(HttpResponse $response): array
    {
        $data = $response->getData();
        unset($data['errcode'], $data['errmsg']);

        return $data;
    }

}