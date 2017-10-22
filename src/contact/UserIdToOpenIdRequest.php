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
 * Class UserIdToOpenIdRequest
 * @package cdcchen\wework\contact
 */
class UserIdToOpenIdRequest extends BaseRequest
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
    public function setUserId(string $id): self
    {
        $this->bodyParams->set('userid', $id);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getUserId(): ?string
    {
        return $this->bodyParams->get('userid');
    }

    /**
     * @param string $id
     * @return static
     */
    public function setAgentId(string $id): self
    {
        $this->bodyParams->set('agentid', $id);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAgentId(): ?string
    {
        return $this->bodyParams->get('agentid');
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