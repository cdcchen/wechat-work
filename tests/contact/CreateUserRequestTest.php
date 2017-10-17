<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/16
 * Time: 17:58
 */

use cdcchen\wework\contact\CreateUserRequest;
use PHPUnit\Framework\TestCase;

class CreateUserRequestTest extends TestCase
{
    /**
     * @var CreateUserRequest
     */
    private $request;

    public function setUp()
    {
        $this->request = new CreateUserRequest();
    }

    public function testSetUserId()
    {
        $this->request->setUserId('chendong');
        $this->assertEquals('chendong', $this->request->getUserId());
    }

    public function testSetName()
    {
        $this->request->setName('陈东');
        $this->assertEquals('陈东', $this->request->getName());
    }

    public function testSetEnglishName()
    {
        $this->request->setEnglishName('Dong Chen');
        $this->assertEquals('Dong Chen', $this->request->getEnglishName());
    }

    public function testSetMobile()
    {
        $this->request->setMobile('18653137700');
        $this->assertEquals('18653137700', $this->request->getMobile());
    }

    public function testSetDepartment()
    {
        $this->request->setDepartment([11, 22], [1, 2]);
        $this->assertEquals([11, 22], $this->request->getDepartment());
    }

    public function testSetDepartmentOrder()
    {
        $this->request->setDepartment([11, 22], [1, 2]);
        $this->assertEquals([1, 2], $this->request->getOrder());
    }

    public function testSetPosition()
    {
        $this->request->setPosition('IT Leader');
        $this->assertEquals('IT Leader', $this->request->getPosition());
    }

    public function testSetGender()
    {
        $this->request->setGender('1');
        $this->assertEquals('1', $this->request->getGender());
    }

    public function testSetEmail()
    {
        $this->request->setEmail('tests@163.com');
        $this->assertEquals('tests@163.com', $this->request->getEmail());
    }

    public function testSetTelephone()
    {
        $this->request->setTelephone('053187925467');
        $this->assertEquals('053187925467', $this->request->getTelephone());
    }

    public function testSetAvatarMediaId()
    {
        $this->request->setAvatarMediaId('jkasdf8ajfiasudf89qdfasdf');
        $this->assertEquals('jkasdf8ajfiasudf89qdfasdf', $this->request->getAvatarMediaId());
    }

    public function testSetEnable()
    {
        $this->request->setEnable(true);
        $this->assertEquals(1, $this->request->getEnable());
    }

    public function testSetDisable()
    {
        $this->request->setEnable(false);
        $this->assertEquals(0, $this->request->getEnable());
    }

    public function testSetExtAttr()
    {
        $jsonEncoded = json_decode('{"attrs":[{"name":"爱好","value":"旅游"},{"name":"卡号","value":"1234567234"}]}', true);
        $this->request->setExtAttr($jsonEncoded);
        $this->assertEquals($jsonEncoded, $this->request->getExtAttr());
    }

    public function testSetAccessToken()
    {
        $token = 'kasdf90ajf0a9sdfu2893jf2i3f';
        $this->request->setAccessToken($token);
        $this->assertEquals($token, $this->request->getAccessToken());
    }

    public function testGetUri()
    {
        $token = 'kasdf90ajf0a9sdfu2893jf2i3f';
        $this->request->setAccessToken($token);
        $url = 'https://qyapi.weixin.qq.com/cgi-bin/user/create?access_token=' . $token;
        $this->assertEquals($url, (string)$this->request->getUri());
    }

    public function testGetRequestUri()
    {
        $token = 'kasdf90ajf0a9sdfu2893jf2i3f';
        $this->request->setAccessToken($token);
        $url = 'https://qyapi.weixin.qq.com/cgi-bin/user/create?access_token=' . $token;
        $this->assertEquals($url, (string)$this->request->getRequest()->getUri());
    }

    public function testRequestMethod()
    {
        $this->assertEquals('POST', $this->request->getRequest()->getMethod());
    }
}