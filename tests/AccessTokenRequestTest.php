<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/16
 * Time: 17:58
 */

use cdcchen\wework\AccessTokenRequest;
use cdcchen\wework\base\AccessToken;
use PHPUnit\Framework\TestCase;

class AccessTokenRequestTest extends TestCase
{
    /**
     * @var AccessTokenRequest
     */
    private $request;

    public function setUp()
    {
        $this->request = new AccessTokenRequest();
    }

    public function testSetSetCredential()
    {
        $id = 'jierg8ygwef';
        $secret = 'jkasdf8ayhsdf9ayf823hf23f';
        $this->request->setCredential($id, $secret);
        $this->assertEquals('jierg8ygwef', $this->request->getCorpId());
    }

    public function testSetCorpSecret()
    {
        $id = 'jierg8ygwef';
        $secret = 'jkasdf8ayhsdf9ayf823hf23f';
        $this->request->setCredential($id, $secret);
        $this->assertEquals('jkasdf8ayhsdf9ayf823hf23f', $this->request->getCorpSecret());
    }

    public function testGetUri()
    {
        $id = 'jierg8ygwef';
        $secret = 'jkasdf8ayhsdf9ayf823hf23f';
        $this->request->setCredential($id, $secret);
        $url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid={$id}&corpsecret={$secret}";
        $this->assertEquals($url, (string)$this->request->getUri());
    }

    public function testRequestMethod()
    {
        $this->assertEquals('GET', $this->request->getRequest()->getMethod());
    }

    public function testSend()
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        /* @var AccessToken $accessToken */
        $accessToken = $this->request->setCredential(CORP_ID, CORP_SECRET)->send();

        $this->assertInstanceOf(AccessToken::class, $accessToken);

        return $accessToken;
    }

    /**
     * @param AccessToken $accessToken
     * @depends testSend
     */
    public function testTokenIsString(AccessToken $accessToken)
    {
        $this->assertTrue(is_string($accessToken->getToken()), $accessToken->getToken());
    }

    /**
     * @param AccessToken $accessToken
     * @depends testSend
     */
    public function testTokenExpiresIsInt(AccessToken $accessToken)
    {
        $this->assertTrue(is_int($accessToken->getExpires()), $accessToken->getExpires());
    }
}