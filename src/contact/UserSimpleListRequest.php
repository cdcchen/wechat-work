<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 17:46
 */

namespace cdcchen\wework\contact;


use cdcchen\http\HttpResponse;
use cdcchen\wework\base\BaseRequest;
use Fig\Http\Message\RequestMethodInterface;

/**
 * Class UserSimpleListRequest
 * @package cdcchen\wework\contact
 */
class UserSimpleListRequest extends BaseRequest
{
    /**
     * @var string
     */
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/user/simplelist';
    /**
     * @var string
     */
    protected $method = RequestMethodInterface::METHOD_GET;

    /**
     * @param int $id
     * @return UserSimpleListRequest
     */
    public function setDepartmentId(int $id): self
    {
        $this->queryParams->set('department_id', $id);
        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getDepartmentId()
    {
        return $this->queryParams->get('department_id');
    }

    /**
     * @param bool $flag
     * @return UserSimpleListRequest
     */
    public function setFetchChild(bool $flag): self
    {
        $this->queryParams->set('fetch_child', (int)$flag);
        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getFetchChild()
    {
        return $this->queryParams->get('fetch_child');
    }

    /**
     * @param HttpResponse $response
     * @return array
     */
    protected function handleResponse(HttpResponse $response): array
    {
        $data = $response->getData();
        unset($data['errcode'], $data['errmsg']);
        return $data['userlist'];
    }
}