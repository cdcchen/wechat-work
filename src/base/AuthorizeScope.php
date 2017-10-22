<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/22
 * Time: 19:10
 */

namespace cdcchen\wework\base;


/**
 * Interface AuthorizeScope
 * @package cdcchen\wework\base
 */
interface AuthorizeScope
{
    const SNSAPI_BASE         = 'snsapi_base';
    const SNSAPI_USER_INFO    = 'snsapi_userinfo';
    const SNSAPI_PRIVATE_INFO = 'snsapi_privateinfo';
}