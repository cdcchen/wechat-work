<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 17:41
 */

namespace cdcchen\wework\agent;


use cdcchen\http\HttpResponse;
use cdcchen\wework\base\BaseRequest;
use Fig\Http\Message\RequestMethodInterface;

/**
 * Class GetUserRequest
 * @package cdcchen\wework\agent
 */
class CreateMenuRequest extends BaseRequest
{
    /**
     * @var string
     */
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/menu/create';
    /**
     * @var string
     */
    protected $method = RequestMethodInterface::METHOD_POST;

    /**
     * @param int $agentId
     * @param array $buttons
     * @return static
     */
    public function setButtons(int $agentId, array $buttons): self
    {
        $this->queryParams->set('agentid', $agentId);
        $this->bodyParams->set('button', $buttons);
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
     * @return array|null
     */
    public function getButtons(): ?array
    {
        return $this->bodyParams->get('button');
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