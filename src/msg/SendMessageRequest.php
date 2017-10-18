<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 13:19
 */

namespace cdcchen\wework\msg;


use cdcchen\http\HttpResponse;
use cdcchen\wework\base\BaseRequest;
use Fig\Http\Message\RequestMethodInterface;

/**
 * Class SendMessageRequest
 * @package cdcchen\wework\msg
 */
class SendMessageRequest extends BaseRequest
{
    /**
     * @var string
     */
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/message/send';
    /**
     * @var string
     */
    protected $method = RequestMethodInterface::METHOD_POST;

    /**
     * @param $message
     * @return static
     */
    public function setMessage(Message $message): self
    {
        $this->bodyParams = $message;
        return $this;
    }

    /**
     * @return \cdcchen\wework\base\AttributeArray
     */
    public function getMessage()
    {
        return $this->bodyParams;
    }

    /**
     * @param HttpResponse $response
     * @return array
     */
    protected function handleResponse(HttpResponse $response): array
    {
        $data = $response->getData();
        unset($data['errcode'], $data['errmsg']);

        return array_map(function ($value) {
            if ($value && is_string($value)) {
                return explode('|', $value);
            }
            return $value;
        }, $data);
    }

}