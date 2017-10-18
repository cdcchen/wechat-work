<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 18:02
 */

namespace msg;


use cdcchen\wework\AccessTokenRequest;
use cdcchen\wework\base\AccessToken;
use cdcchen\wework\msg\MessageClient;
use PHPUnit\Framework\TestCase;

class MessageClientTest extends TestCase
{
    static $accessToken;

    /**
     * @var MessageClient
     */
    protected $client;

    public static function setUpBeforeClass()
    {
        /** @var AccessToken $token */
        $token = (new AccessTokenRequest())->setCredential(CORP_ID, AGENT_SECRET)->send();
        static::$accessToken = $token->getToken();
    }

    public function setUp()
    {
        $this->client = (new MessageClient())->setAccessToken(static::$accessToken);
    }

    public function testSendText()
    {
        $data = $this->client->sendText(AGENT_ID, '测试文本内容', [USER_ID]);
        $this->assertTrue(is_array($data));
    }
}