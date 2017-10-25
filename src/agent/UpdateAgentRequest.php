<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 17:41
 */

namespace cdcchen\wework\agent;


use cdcchen\http\HttpResponse;
use cdcchen\wework\base\AttributeArray;
use cdcchen\wework\base\BaseRequest;
use Fig\Http\Message\RequestMethodInterface;

/**
 * Class GetUserRequest
 * @package cdcchen\wework\agent
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
     * @param int $agentId
     * @param array $attributes
     * @return self
     */
    public function setAttributes(int $agentId, array $attributes)
    {
        $attributes['agentid'] = $agentId;
        $this->bodyParams = new AttributeArray($attributes);

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
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->bodyParams->toArray();
    }

    /**
     * @param HttpResponse $response
     * @return bool
     */
    protected function handleResponse(HttpResponse $response): bool
    {
        return true;
    }
}