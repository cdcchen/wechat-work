<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 18:09
 */

namespace cdcchen\wework\contact;


use cdcchen\http\HttpResponse;
use cdcchen\wework\base\BaseRequest;
use Fig\Http\Message\RequestMethodInterface;

/**
 * Class UserAuthSuccessRequest
 * @package cdcchen\wework\contact
 */
class UserAuthSuccessRequest extends BaseRequest
{
    /**
     * @var string
     */
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/user/authsucc';
    /**
     * @var string
     */
    protected $method = RequestMethodInterface::METHOD_GET;

    /**
     * @param string $id
     * @return UserAuthSuccessRequest
     */
    public function setUserId(string $id): self
    {
        $this->queryParams->set('userid', $id);
        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getUserId()
    {
        return $this->queryParams->get('userid');
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