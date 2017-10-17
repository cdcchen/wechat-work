<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/16
 * Time: 20:02
 */

use cdcchen\wework\base\AccessToken;
use cdcchen\wework\base\AppCredential;
use cdcchen\wework\AccessTokenClient;
use PHPUnit\Framework\TestCase;

class AccessTokenClientTest extends TestCase
{
    public function testGetAccessTokenInstance()
    {
        $id = 'wwb0d41a0338b7162d';
        $secret = 'SmGbnOYTA6NtSVL4l3JOr9wZyVpjunGLpe7zfUHP0aQ';

        $client = new AccessTokenClient(new AppCredential($id, $secret));
        $token = $client->getToken();

        $this->assertInstanceOf(AccessToken::class, $token);

        return $token;
    }

    /**
     * @param AccessToken $token
     * @return AccessToken
     * @depends testGetAccessTokenInstance
     */
    public function testGetAccessToken(AccessToken $token)
    {
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