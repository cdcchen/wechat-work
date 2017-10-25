<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/25
 * Time: 13:19
 */

namespace base;


use cdcchen\wework\base\AccessToken;
use PHPUnit\Framework\TestCase;

class AccessTokenTest extends TestCase
{
    const ACCESS_TOKEN  = 'asjasd8fweifonwqfqlwef';
    const TOKEN_EXPIRES = 7200;

    public function testInstance()
    {
        $token = new AccessToken(self::ACCESS_TOKEN, self::TOKEN_EXPIRES);
        $this->assertInstanceOf(AccessToken::class, $token);

        return $token;
    }

    /**
     * @param AccessToken $token
     * @depends testInstance
     */
    public function testGetToken(AccessToken $token)
    {
        $this->assertEquals(self::ACCESS_TOKEN, $token->getToken());
    }

    /**
     * @param AccessToken $token
     * @depends testInstance
     */
    public function testGetExpires(AccessToken $token)
    {
        $this->assertEquals(self::TOKEN_EXPIRES, $token->getExpires());
    }

    /**
     * @param AccessToken $token
     * @depends testInstance
     */
    public function testIsNotExpires(AccessToken $token)
    {
        $this->assertFalse($token->isExpired());
    }

    /**
     * @param AccessToken $token
     * @depends testInstance
     */
    public function testGetCreateTime(AccessToken $token)
    {
        $this->assertGreaterThan(0, $token->getCreatedTime());
    }

    /**
     * @param AccessToken $token
     * @depends testInstance
     * @return string
     */
    public function testSerialize(AccessToken $token)
    {
        $data = [
            'token' => $token->getToken(),
            'expires' => $token->getExpires(),
            'createdTime' => $token->getCreatedTime(),
        ];

        $actual = serialize($token);
        $this->assertContains(serialize($data), $actual);

        return $actual;
    }

    /**
     * @param string $serialized
     * @depends testSerialize
     */
    public function testUnSerializeTokenOk(string $serialized)
    {
        /**
         * @var AccessToken $token
         */
        $token = unserialize($serialized);
        $this->assertEquals(self::ACCESS_TOKEN, $token->getToken());
    }

    /**
     * @param string $serialized
     * @depends testSerialize
     */
    public function testUnSerializeExpiresOk(string $serialized)
    {
        /**
         * @var AccessToken $token
         */
        $token = unserialize($serialized);
        $this->assertEquals(self::TOKEN_EXPIRES, $token->getExpires());
    }

    /**
     * @param AccessToken $token
     * @depends testInstance
     */
    public function testJsonSerialize(AccessToken $token)
    {
        $data = [
            'token' => $token->getToken(),
            'expires' => $token->getExpires(),
            'createdTime' => $token->getCreatedTime(),
        ];

        $this->assertEquals(json_encode($data), json_encode($token));
    }

    public function testIsExpiresIsTrue()
    {
        $token = new AccessToken(self::ACCESS_TOKEN, 2);
        sleep(3);
        $this->assertTrue($token->isExpired());
    }
}