<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 17:47
 */

namespace cdcchen\wework\contact;


use cdcchen\http\HttpResponse;
use cdcchen\wework\base\BaseRequest;
use Fig\Http\Message\RequestMethodInterface;

class UserDetailListRequest extends BaseRequest
{
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/user/list';
    protected $method = RequestMethodInterface::METHOD_GET;

    public function setDepartmentId(int $id): self
    {
        $this->queryParams->set('department_id', $id);
        return $this;
    }

    public function getDepartmentId()
    {
        return $this->queryParams->get('department_id');
    }

    public function setFetchChild(bool $flag): self
    {
        $this->queryParams->set('fetch_child', (int)$flag);
        return $this;
    }

    public function getFetchChild()
    {
        return $this->queryParams->get('fetch_child');
    }

    protected function handleResponse(HttpResponse $response): array
    {
        $data = $response->getData();
        unset($data['errcode'], $data['errmsg']);
        return $data['userlist'];
    }
}