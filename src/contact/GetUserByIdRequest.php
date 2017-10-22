<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 17:41
 */

namespace cdcchen\wework\contact;


use cdcchen\http\HttpResponse;
use cdcchen\wework\base\BaseRequest;
use Fig\Http\Message\RequestMethodInterface;

/**
 * Class GetUserByIdRequest
 * @package cdcchen\wework\contact
 */
class GetUserByIdRequest extends BaseRequest
{
    /**
     * @var string
     */
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/user/get';
    /**
     * @var string
     */
    protected $method = RequestMethodInterface::METHOD_GET;

    /**
     * @param string $id
     * @return static
     */
    public function setUserId(string $id): self
    {
        $this->queryParams->set('userid', $id);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getUserId(): ?string
    {
        return $this->queryParams->get('userid');
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