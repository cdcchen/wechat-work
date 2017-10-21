<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/19
 * Time: 11:58
 */

namespace cdcchen\wework\contact;


/**
 * Class ReplaceDepartmentRequest
 * @package cdcchen\wework\contact
 */
class ReplaceDepartmentRequest extends AsyncRequest
{
    /**
     * @var string
     */
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/batch/replaceparty';
}