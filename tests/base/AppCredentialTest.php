<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/25
 * Time: 13:19
 */

namespace base;


use cdcchen\wework\base\AppCredential;
use PHPUnit\Framework\TestCase;

class AppCredentialTest extends TestCase
{
    public function testInstance()
    {
        $credential = new AppCredential(CORP_ID, CORP_SECRET);
        $this->assertInstanceOf(AppCredential::class, $credential);

        return $credential;
    }

    /**
     * @param AppCredential $credential
     * @depends testInstance
     */
    public function testGetId(AppCredential $credential)
    {
        $this->assertEquals(CORP_ID, $credential->getId());
    }

    /**
     * @param AppCredential $credential
     * @depends testInstance
     */
    public function testGetSecret(AppCredential $credential)
    {
        $this->assertEquals(CORP_SECRET, $credential->getSecret());
    }

    /**
     * @param AppCredential $credential
     * @depends testInstance
     */
    public function testToArray(AppCredential $credential)
    {
        $expected = [
            'id' => $credential->getId(),
            'secret' => $credential->getSecret(),
        ];
        $this->assertEquals($expected, $credential->toArray());
    }

    /**
     * @param AppCredential $credential
     * @depends testInstance
     * @return string
     */
    public function testSerialize(AppCredential $credential)
    {
        $data = [
            'id' => $credential->getId(),
            'secret' => $credential->getSecret(),
        ];

        $actual = serialize($credential);
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
         * @var AppCredential $credential
         */
        $credential = unserialize($serialized);
        $this->assertEquals(CORP_ID, $credential->getId());
    }

    /**
     * @param string $serialized
     * @depends testSerialize
     */
    public function testUnSerializeExpiresOk(string $serialized)
    {
        /**
         * @var AppCredential $credential
         */
        $credential = unserialize($serialized);
        $this->assertEquals(CORP_SECRET, $credential->getSecret());
    }

    /**
     * @param AppCredential $credential
     * @depends testInstance
     */
    public function testJsonSerialize(AppCredential $credential)
    {
        $data = [
            'id' => $credential->getId(),
            'secret' => $credential->getSecret(),
        ];

        $this->assertEquals(json_encode($data), json_encode($credential));
    }
}