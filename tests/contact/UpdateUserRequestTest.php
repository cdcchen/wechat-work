<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/16
 * Time: 17:58
 */

namespace contact;

use cdcchen\wework\contact\UpdateUserRequest;
use cdcchen\wework\contact\User;
use PHPUnit\Framework\TestCase;

class UpdateUserRequestTest extends TestCase
{
    /**
     * @var UpdateUserRequest
     */
    private $request;

    public function setUp()
    {
        $this->request = new UpdateUserRequest();
    }

    public function testSetUserInfo()
    {
        $user = new User();
        $user->setUserId('chendong');
        $user->setName('陈东');
        $user->setEnglishName('Dong Chen');
        $user->setMobile('18653137700');
        $user->setDepartment([11, 22], [1, 2]);
        $user->setDepartment([11, 22], [1, 2]);
        $user->setPosition('IT Leader');
        $user->setGender('1');
        $user->setEmail('tests@163.com');
        $user->setTelephone('053187925467');
        $user->setAvatarMediaId('jkasdf8ajfiasudf89qdfasdf');
        $user->setEnable(true);
        $user->setEnable(false);
        $jsonEncoded = json_decode('{"attrs":[{"name":"爱好","value":"旅游"},{"name":"卡号","value":"1234567234"}]}', true);
        $user->setExtAttr($jsonEncoded);
        $this->request->setUserInfo($user);

        $this->assertEquals($user, $this->request->getUserInfo());
    }

    public function testGetUri()
    {
        $token = 'kasdf90ajf0a9sdfu2893jf2i3f';
        $this->request->setAccessToken($token);
        $url = 'https://qyapi.weixin.qq.com/cgi-bin/user/update?access_token=' . $token;
        $this->assertEquals($url, (string)$this->request->getUri());
    }

    public function testGetRequestUri()
    {
        $token = 'kasdf90ajf0a9sdfu2893jf2i3f';
        $this->request->setAccessToken($token);
        $url = 'https://qyapi.weixin.qq.com/cgi-bin/user/update?access_token=' . $token;
        $this->assertEquals($url, (string)$this->request->getRequest()->getUri());
    }

    public function testRequestMethod()
    {
        $this->assertEquals('POST', $this->request->getRequest()->getMethod());
    }
}