<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 19:41
 */

namespace cdcchen\wework\contact;


use cdcchen\http\HttpResponse;
use cdcchen\wework\base\BaseRequest;
use cdcchen\wework\base\CallbackCredential;
use Fig\Http\Message\RequestMethodInterface;

/**
 * Class AsyncRequest
 * @package cdcchen\wework\contact
 */
abstract class AsyncRequest extends BaseRequest
{
    /**
     * @var string
     */
    protected $method = RequestMethodInterface::METHOD_POST;

    /**
     * @param string $mediaId
     * @return static
     */
    public function setMediaId(string $mediaId): self
    {
        $this->bodyParams->set('media_id', $mediaId);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMediaId(): ?string
    {
        return $this->bodyParams->get('media_id');
    }

    /**
     * @param CallbackCredential $callback
     * @return AsyncRequest
     */
    public function setCallback(CallbackCredential $callback): self
    {
        $this->bodyParams->set('callback', $callback);
        return $this;
    }

    /**
     * @return CallbackCredential|null
     */
    public function getCallback(): ?CallbackCredential
    {
        return $this->bodyParams->get('callback');
    }

    /**
     * @param HttpResponse $response
     * @return string
     */
    protected function handleResponse(HttpResponse $response): string
    {
        $data = $response->getData();
        return $data['jobid'];
    }
}