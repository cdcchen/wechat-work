<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/16
 * Time: 14:24
 */

namespace cdcchen\wework\contact;


use cdcchen\http\HttpResponse;
use cdcchen\wework\base\AttributeArray;
use cdcchen\wework\base\BaseRequest;
use Fig\Http\Message\RequestMethodInterface;

/**
 * Class CreateUserRequest
 * @package cdcchen\wework
 */
class CreateUserRequest extends BaseRequest
{
    /**
     * @var string
     */
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/user/create';
    /**
     * @var string
     */
    protected $method = RequestMethodInterface::METHOD_POST;

    /**
     * @param User $user
     * @return static
     */
    public function setUserInfo(User $user): self
    {
        $this->bodyParams = $user;
        return $this;
    }

    /**
     * @return User|AttributeArray
     */
    public function getUserInfo(): User
    {
        return $this->bodyParams;
    }

    protected function handleResponse(HttpResponse $response): bool
    {
        return true;
    }
}