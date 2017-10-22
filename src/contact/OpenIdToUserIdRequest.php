<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 17:49
 */

namespace cdcchen\wework\contact;


use cdcchen\http\HttpResponse;
use cdcchen\wework\base\BaseRequest;
use Fig\Http\Message\RequestMethodInterface;

/**
 * Class OpenIdToOpenIdRequest
 * @package cdcchen\wework\contact
 */
class OpenIdToOpenIdRequest extends BaseRequest
{
    /**
     * @var string
     */
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/user/convert_to_openid';
    /**
     * @var string
     */
    protected $method = RequestMethodInterface::METHOD_POST;

    /**
     * @param string $id
     * @return static
     */
    public function setOpenId(string $id): self
    {
        $this->bodyParams->set('openid', $id);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getOpenId(): ?string
    {
        return $this->queryParams->get('openid');
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