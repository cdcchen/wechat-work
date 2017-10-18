<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 17:43
 */

namespace cdcchen\wework\contact;


class UpdateUserRequest extends CreateUserRequest
{
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/user/update';
}