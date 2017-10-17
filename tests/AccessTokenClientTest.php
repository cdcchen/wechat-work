<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/16
 * Time: 20:02
 */

use cdcchen\wechat\work\AccessTokenClient;
use PHPUnit\Framework\TestCase;
use cdcchen\wechat\common\AccessToken;

class AccessTokenClientTest extends TestCase
{
    public function testGetAccessToken()
    {
        $id = 'wwb0d41a0338b7162d';
        $secret = 'SmGbnOYTA6NtSVL4l3JOr9wZyVpjunGLpe7zfUHP0aQ';

        $client = new AccessTokenClient($id, $secret);
        $token = $client->getToken();

        $this->assertTrue(is_string($token->getToken()));

        return $token;
    }

    /**
     * @param AccessToken $token
     * @depends testGetAccessToken
     */
    public function testGetAccessTokenExpires(AccessToken $token)
    {
        $this->assertTrue(is_int($token->getExpires()));
    }
}