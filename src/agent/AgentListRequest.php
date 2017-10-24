<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 19:41
 */

namespace cdcchen\wework\agent;


use cdcchen\http\HttpResponse;
use cdcchen\wework\base\BaseRequest;
use Fig\Http\Message\RequestMethodInterface;

/**
 * Class AgentListRequest
 * @package cdcchen\wework\agent
 */
class AgentListRequest extends BaseRequest
{
    /**
     * @var string
     */
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/agent/list';
    /**
     * @var string
     */
    protected $method = RequestMethodInterface::METHOD_GET;

    /**
     * @param HttpResponse $response
     * @return array
     */
    protected function handleResponse(HttpResponse $response): array
    {
        $data = $response->getData();
        return $data['agentlist'];
    }
}