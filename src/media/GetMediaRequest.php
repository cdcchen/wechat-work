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
use Psr\Http\Message\StreamInterface;

/**
 * Class GetMediaRequest
 * @package cdcchen\wework\media
 */
class GetMediaRequest extends BaseRequest
{
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/media/get';
    protected $method = RequestMethodInterface::METHOD_GET;

    /**
     * @param string $mediaId
     * @return static
     */
    public function setMediaId(string $mediaId): self
    {
        $this->queryParams->set('media_id', $mediaId);
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
     * @return StreamInterface
     */
    protected function handleResponse(HttpResponse $response): StreamInterface
    {
        return $response->getBody();
    }

}