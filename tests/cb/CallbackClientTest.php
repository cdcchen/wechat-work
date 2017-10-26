<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/25
 * Time: 21:01
 */

namespace cb;


use cdcchen\wework\base\CallbackCredential;
use cdcchen\wework\cb\CallbackClient;
use PHPUnit\Framework\TestCase;

class CallbackClientTest extends TestCase
{
    public function testInstance()
    {
        $credential = new CallbackCredential(CB_URL, CB_TOKEN, CB_ENCODING_AES_KEY);
        $client = new CallbackClient(CORP_ID, $credential);

        $this->assertInstanceOf(CallbackClient::class, $client);

        return $client;
    }

    /**
     * @param CallbackClient $client
     * @depends testInstance
     */
    public function testVerify(CallbackClient $client)
    {
        $timestamp = 1509001251;
        $nonce = 'bhk69ZF5pborPZ3c';
        $encryptedEchoStr = 'SGA8bkNjYeWW%2FzcB1C22NWnJGz%2FKsq%2B7VI45jF%2BfXNQSXVu7d3YakZrNFiC%2FHXwK7R4W50K39jkgVnumQuQi6g%3D%3D'; // hello
        $signature = '41be59ed820a74551402df94ac8a125a7f05bcc0';

        $echoStr = $client->verify(urldecode($signature), urldecode($encryptedEchoStr), urldecode($nonce), urldecode($timestamp));
        $this->assertTrue($echoStr === 'hello');
    }
}