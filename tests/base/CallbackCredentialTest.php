<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/25
 * Time: 13:19
 */

namespace base;


use cdcchen\wework\base\CallbackCredential;
use PHPUnit\Framework\TestCase;

class CallbackCredentialTest extends TestCase
{
    public function testInstance()
    {
        $credential = new CallbackCredential(CB_URL, CB_TOKEN, CB_ENCODING_AES_KEY);
        $this->assertInstanceOf(CallbackCredential::class, $credential);

        return $credential;
    }

    /**
     * @param CallbackCredential $credential
     * @depends testInstance
     */
    public function testGetUrl(CallbackCredential $credential)
    {
        $this->assertEquals(CB_URL, $credential->getUrl());
    }

    /**
     * @param CallbackCredential $credential
     * @depends testInstance
     */
    public function testGetToken(CallbackCredential $credential)
    {
        $this->assertEquals(CB_TOKEN, $credential->getToken());
    }

    /**
     * @param CallbackCredential $credential
     * @depends testInstance
     */
    public function testGetEncodingAesKey(CallbackCredential $credential)
    {
        $this->assertEquals(CB_ENCODING_AES_KEY, $credential->getEncodingAesKey());
    }

    /**
     * @param CallbackCredential $credential
     * @depends testInstance
     */
    public function testToArray(CallbackCredential $credential)
    {
        $expected = [
            'url' => $credential->getUrl(),
            'token' => $credential->getToken(),
            'encoding_aes_key' => $credential->getEncodingAesKey(),
        ];
        $this->assertEquals($expected, $credential->toArray());
    }

    /**
     * @param CallbackCredential $credential
     * @depends testInstance
     * @return string
     */
    public function testSerialize(CallbackCredential $credential)
    {
        $data = [
            'url' => $credential->getUrl(),
            'token' => $credential->getToken(),
            'encoding_aes_key' => $credential->getEncodingAesKey(),
        ];

        $actual = serialize($credential);
        $this->assertContains(serialize($data), $actual);

        return $actual;
    }

    /**
     * @param string $serialized
     * @depends testSerialize
     */
    public function testUnSerialize(string $serialized)
    {
        /**
         * @var CallbackCredential $credential
         */
        $credential = unserialize($serialized);
        $expected = [
            'url' => $credential->getUrl(),
            'token' => $credential->getToken(),
            'encoding_aes_key' => $credential->getEncodingAesKey(),
        ];
        $this->assertEquals($expected, $credential->toArray());
    }

    /**
     * @param CallbackCredential $credential
     * @depends testInstance
     */
    public function testJsonSerialize(CallbackCredential $credential)
    {
        $data = [
            'url' => $credential->getUrl(),
            'token' => $credential->getToken(),
            'encoding_aes_key' => $credential->getEncodingAesKey(),
        ];

        $this->assertEquals(json_encode($data), json_encode($credential));
    }
}