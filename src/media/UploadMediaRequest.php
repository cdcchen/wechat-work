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

class UploadMediaRequest extends BaseRequest
{
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/media/upload';
    protected $method = RequestMethodInterface::METHOD_POST;
    protected $format = '';

    public function setType(string $type): self
    {
        $this->queryParams->set('type', $type);
        return $this;
    }

    public function getType(): ?string
    {
        return $this->queryParams->get('type');
    }

    public function setMedia(string $filename)
    {
        $stream = new Stream(fopen($filename, 'rb'));
        $this->body = new MultipartStream([new FormDataPart('media', $stream, basename($filename))]);
        return $this;
    }

    protected function handleResponse(HttpResponse $response)
    {
        $data = $response->getData();
        unset($data['errcode'], $data['errmsg']);

        return $data;
    }

}