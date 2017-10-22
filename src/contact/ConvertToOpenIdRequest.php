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
 * Class ConvertToOpenIdRequest
 * @package cdcchen\wework\contact
 */
class ConvertToOpenIdRequest extends BaseRequest
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
     * @return ConvertToOpenIdRequest
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
     * @param string $id
     * @return ConvertToOpenIdRequest
     */
    public function setAgentId(string $id): self
    {
        $this->queryParams->set('agentid', $id);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAgentId(): ?string
    {
        return $this->queryParams->get('agentid');
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