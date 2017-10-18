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

class ConvertToOpenIdRequest extends BaseRequest
{
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/user/convert_to_openid';
    protected $method = RequestMethodInterface::METHOD_POST;

    public function setUserId(string $id): self
    {
        $this->queryParams->set('userid', $id);
        return $this;
    }

    public function getUserId(): ?string
    {
        return $this->queryParams->get('userid');
    }

    public function setAgentId(string $id): self
    {
        $this->queryParams->set('agentid', $id);
        return $this;
    }

    public function getAgentId(): ?string
    {
        return $this->queryParams->get('agentid');
    }

    protected function handleResponse(HttpResponse $response): array
    {
        $data = $response->getData();
        unset($data['errcode'], $data['errmsg']);

        return $data;
    }
}