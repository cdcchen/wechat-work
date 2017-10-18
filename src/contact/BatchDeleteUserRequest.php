<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 17:45
 */

namespace cdcchen\wework\contact;


use cdcchen\http\HttpResponse;
use cdcchen\wework\base\BaseRequest;
use Fig\Http\Message\RequestMethodInterface;

class BatchDeleteUserRequest extends BaseRequest
{
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/user/batchdelete';
    protected $method = RequestMethodInterface::METHOD_POST;

    public function setUserIdList(array $list): self
    {
        $this->queryParams->set('useridlist', $list);
        return $this;
    }

    public function getUserIdList(): ?array
    {
        return $this->queryParams->get('useridlist');
    }

    protected function handleResponse(HttpResponse $response): bool
    {
        return true;
    }
}