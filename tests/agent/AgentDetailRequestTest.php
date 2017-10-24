<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/24
 * Time: 19:51
 */

namespace agent;


use cdcchen\wework\AccessTokenRequest;
use cdcchen\wework\agent\AgentDetailRequest;
use cdcchen\wework\base\AccessToken;
use PHPUnit\Framework\TestCase;

class AgentDetailRequestTest extends TestCase
{
    static $accessToken;

    /**
     * @var AgentDetailRequest
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
        $this->request = (new AgentDetailRequest())->setAccessToken(static::$accessToken);
    }

    public function testInstance()
    {
        $this->assertInstanceOf(AgentDetailRequest::class, new AgentDetailRequest());
    }

    public function testSetAgentId()
    {
        $this->request->setAgentId(AGENT_ID);
        $this->assertEquals(AGENT_ID, $this->request->getAgentId());
    }

    public function testSend()
    {
        $data = $this->request->setAgentId(AGENT_ID)->send();
        $this->assertTrue(is_array($data));
    }

    /**
     * @param string $attr
     * @dataProvider agentAttributes
     */
    public function testAttributeExist(string $attr)
    {
        $data = $this->request->setAgentId(AGENT_ID)->send();
        $this->assertArrayHasKey($attr, $data);
    }

    public function agentAttributes()
    {
        return [
            ['agentid'],
            ['name'],
            ['square_logo_url'],
            ['description'],
            ['allow_userinfos'],
            ['allow_partys'],
            ['close'],
            ['redirect_domain'],
            ['report_location_flag'],
            ['isreportenter'],
            ['home_url'],
        ];
    }
}