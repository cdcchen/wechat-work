<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/16
 * Time: 17:58
 */

namespace contact;

use cdcchen\wework\contact\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * @var User
     */
    private $user;

    public function setUp()
    {
        $this->user = new User();
    }

    public function testSetUserId()
    {
        $this->user->setUserId('chendong');
        $this->assertEquals('chendong', $this->user->getUserId());
    }

    public function testSetName()
    {
        $this->user->setName('陈东');
        $this->assertEquals('陈东', $this->user->getName());
    }

    public function testSetEnglishName()
    {
        $this->user->setEnglishName('Dong Chen');
        $this->assertEquals('Dong Chen', $this->user->getEnglishName());
    }

    public function testSetMobile()
    {
        $this->user->setMobile('18653137700');
        $this->assertEquals('18653137700', $this->user->getMobile());
    }

    public function testSetDepartment()
    {
        $this->user->setDepartment([11, 22], [1, 2]);
        $this->assertEquals([11, 22], $this->user->getDepartment());
    }

    public function testSetDepartmentOrder()
    {
        $this->user->setDepartment([11, 22], [1, 2]);
        $this->assertEquals([1, 2], $this->user->getOrder());
    }

    public function testSetPosition()
    {
        $this->user->setPosition('IT Leader');
        $this->assertEquals('IT Leader', $this->user->getPosition());
    }

    public function testSetGender()
    {
        $this->user->setGender('1');
        $this->assertEquals('1', $this->user->getGender());
    }

    public function testSetEmail()
    {
        $this->user->setEmail('tests@163.com');
        $this->assertEquals('tests@163.com', $this->user->getEmail());
    }

    public function testSetTelephone()
    {
        $this->user->setTelephone('053187925467');
        $this->assertEquals('053187925467', $this->user->getTelephone());
    }

    public function testSetAvatarMediaId()
    {
        $this->user->setAvatarMediaId('jkasdf8ajfiasudf89qdfasdf');
        $this->assertEquals('jkasdf8ajfiasudf89qdfasdf', $this->user->getAvatarMediaId());
    }

    public function testSetEnable()
    {
        $this->user->setEnable(true);
        $this->assertEquals(1, $this->user->getEnable());
    }

    public function testSetDisable()
    {
        $this->user->setEnable(false);
        $this->assertEquals(0, $this->user->getEnable());
    }

    public function testSetExtAttr()
    {
        $jsonEncoded = json_decode('{"attrs":[{"name":"爱好","value":"旅游"},{"name":"卡号","value":"1234567234"}]}', true);
        $this->user->setExtAttr($jsonEncoded);
        $this->assertEquals($jsonEncoded, $this->user->getExtAttr());
    }
}