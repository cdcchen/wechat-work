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
 * Class GetUserRequest
 * @package cdcchen\wework\contact
 */
class UpdateAgentRequest extends BaseRequest
{
    /**
     * @var string
     */
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/agent/set';
    /**
     * @var string
     */
    protected $method = RequestMethodInterface::METHOD_POST;

    /**
     * @param string $id
     * @return static
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