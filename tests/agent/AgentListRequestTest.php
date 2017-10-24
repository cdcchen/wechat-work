<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/24
 * Time: 19:51
 */

namespace agent;


use cdcchen\wework\AccessTokenRequest;
use cdcchen\wework\agent\AgentListRequest;
use cdcchen\wework\base\AccessToken;
use PHPUnit\Framework\TestCase;

class AgentListRequestTest extends TestCase
{
    static $accessToken;

    /**
     * @var AgentListRequest
     */
    protected $request;

    public static function setUpBeforeClass()
    {
        /** @var AccessToken $token */
        $token = (new AccessTokenRequest())->setCredential(CORP_ID, AGENT_SECRET)->send();
        static::$accessToken = $token->getToken();
    }

    public function setUp()
    {
        $this->request = (new AgentListRequest())->setAccessToken(static::$accessToken);
    }

    public function testInstance()
    {
        $this->assertInstanceOf(AgentListRequest::class, new AgentListRequest());
    }

    public function testSend()
    {
        $data = $this->request->send();
        $this->assertTrue(is_array($data));
    }

    /**
     * @param string $attr
     * @dataProvider agentAttributes
     */
    public function testAttributeExist(string $attr)
    {
        $data = $this->request->send();
        if (empty($data)) {
            $this->markTestSkipped('agent list is empty, skip.');
        } else {
            $this->assertArrayHasKey($attr, $data[0]);
        }
    }

    public function agentAttributes()
    {
        return [
            ['agentid'],
            ['name'],
            ['square_logo_url'],
        ];
    }
}