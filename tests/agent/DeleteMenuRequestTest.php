<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/24
 * Time: 19:51
 */

namespace agent;


use cdcchen\wework\AccessTokenRequest;
use cdcchen\wework\agent\DeleteMenuRequest;
use cdcchen\wework\base\AccessToken;
use PHPUnit\Framework\TestCase;

class DeleteMenuRequestTest extends TestCase
{
    static $accessToken;

    /**
     * @var DeleteMenuRequest
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
        $this->request = (new DeleteMenuRequest())->setAccessToken(static::$accessToken);
    }

    public function testInstance()
    {
        $this->assertInstanceOf(DeleteMenuRequest::class, new DeleteMenuRequest());
    }

    public function testSetAgentId()
    {
        $this->request->setAgentId(AGENT_ID);
        $this->assertEquals(AGENT_ID, $this->request->getAgentId());

        return $this->request;
    }

    /**
     * @param DeleteMenuRequest $request
     * @depends testSetAgentId
     */
    public function testSend(DeleteMenuRequest $request)
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $result = $request->send();
        $this->assertTrue($result);
    }
}