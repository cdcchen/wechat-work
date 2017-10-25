<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/24
 * Time: 19:51
 */

namespace agent;


use cdcchen\wework\AccessTokenRequest;
use cdcchen\wework\agent\UpdateAgentRequest;
use cdcchen\wework\base\AccessToken;
use PHPUnit\Framework\TestCase;

class UpdateAgentRequestTest extends TestCase
{
    static $accessToken;

    /**
     * @var UpdateAgentRequest
     */
    protected $request;

    public static function setUpBeforeClass()
    {
        if (SKIP_REAL_REQUEST) {
            $token = new AccessToken(__METHOD__, 7200);
        } else {
            /** @var AccessToken $token */
            $token = (new AccessTokenRequest())->setCredential(CORP_ID, AGENT_SECRET)->send();
        }
        static::$accessToken = $token->getToken();
    }

    public function setUp()
    {
        $this->request = (new UpdateAgentRequest())->setAccessToken(static::$accessToken);
    }

    public function testInstance()
    {
        $this->assertInstanceOf(UpdateAgentRequest::class, new UpdateAgentRequest());
    }

    public function testSetAttributes()
    {
        $attributes = [
            'report_location_flag' => 1,
            'description' => '更新后的description - ' . date('Y-m-d H:i:s'),
        ];
        $this->request->setAttributes(AGENT_ID, $attributes);
        $attributes['agentid'] = AGENT_ID;
        $this->assertEquals($attributes, $this->request->getAttributes());

        return $this->request;
    }

    /**
     * @param UpdateAgentRequest $request
     * @depends testSetAttributes
     */
    public function testSetAgentId(UpdateAgentRequest $request)
    {
        $this->assertEquals(AGENT_ID, $request->getAgentId());
    }

    /**
     * @param UpdateAgentRequest $request
     * @depends testSetAttributes
     */
    public function testSend(UpdateAgentRequest $request)
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $result = $request->send();
        $this->assertTrue($result);
    }
}