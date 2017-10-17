<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/16
 * Time: 17:58
 */

use cdcchen\wechat\work\AccessTokenRequest;
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

    public function testSetCorpId()
    {
        $this->request->setCorpId('jierg8ygwef');
        $this->assertEquals('jierg8ygwef', $this->request->getCorpId());
    }

    public function testSetCorpSecret()
    {
        $this->request->setCorpSecret('jkasdf8ayhsdf9ayf823hf23f');
        $this->assertEquals('jkasdf8ayhsdf9ayf823hf23f', $this->request->getCorpSecret());
    }

    public function testGetUri()
    {
        $corpId = 'jierg8ygwef';
        $corpSecret = 'jkasdf8ayhsdf9ayf823hf23f';
        $this->request->setCorpId($corpId);
        $this->request->setCorpSecret($corpSecret);
        $url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid={$corpId}&corpsecret={$corpSecret}";
        $this->assertEquals($url, (string)$this->request->getUri());
    }

    public function testRequestMethod()
    {
        $this->assertEquals('GET', $this->request->getRequest()->getMethod());
    }
}