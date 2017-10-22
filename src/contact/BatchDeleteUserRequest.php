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

/**
 * Class BatchDeleteUserRequest
 * @package cdcchen\wework\contact
 */
class BatchDeleteUserRequest extends BaseRequest
{
    /**
     * @var string
     */
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/user/batchdelete';
    /**
     * @var string
     */
    protected $method = RequestMethodInterface::METHOD_POST;

    /**
     * @param array $list
     * @return BatchDeleteUserRequest
     */
    public function setUserIdList(array $list): self
    {
        $this->queryParams->set('useridlist', $list);
        return $this;
    }

    /**
     * @return array|null
     */
    public function getUserIdList(): ?array
    {
        return $this->queryParams->get('useridlist');
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