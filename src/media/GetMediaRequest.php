<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/19
 * Time: 12:06
 */

namespace cdcchen\wework\media;


use cdcchen\http\HttpResponse;
use cdcchen\wework\base\BaseRequest;
use Fig\Http\Message\RequestMethodInterface;

/**
 * Class GetMediaRequest
 * @package cdcchen\wework\media
 */
class GetMediaRequest extends BaseRequest
{
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/media/get';
    protected $method = RequestMethodInterface::METHOD_GET;

    /**
     * @param string $type
     * @return static
     */
    public function setMediaId(string $type): self
    {
        $this->queryParams->set('media_id', $type);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getMedia(): ?string
    {
        return $this->queryParams->get('media_id');
    }

    /**
     * @param HttpResponse $response
     * @return string
     */
    protected function handleResponse(HttpResponse $response): string
    {
        return (string)$response->getBody();
    }

}