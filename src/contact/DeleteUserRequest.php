<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 17:44
 */

namespace cdcchen\wework\contact;


use cdcchen\http\HttpResponse;
use cdcchen\wework\base\BaseRequest;
use Fig\Http\Message\RequestMethodInterface;

class DeleteUserRequest extends BaseRequest
{
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/user/delete';
    protected $method = RequestMethodInterface::METHOD_POST;

    public function setUserId(string $id): self
    {
        $this->queryParams->set('userid', $id);
        return $this;
    }

    public function getUserId()
    {
        return $this->queryParams->get('userid');
    }

    protected function handleResponse(HttpResponse $response):bool
    {
        return true;
    }
}