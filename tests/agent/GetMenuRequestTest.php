<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/24
 * Time: 19:51
 */

namespace agent;


use cdcchen\wework\AccessTokenRequest;
use cdcchen\wework\agent\CreateMenuRequest;
use cdcchen\wework\agent\GetMenuRequest;
use cdcchen\wework\agent\MenuItem;
use cdcchen\wework\base\AccessToken;
use PHPUnit\Framework\TestCase;

class GetMenuRequestTest extends TestCase
{
    static $accessToken;

    /**
     * @var GetMenuRequest
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
        $this->request = (new GetMenuRequest())->setAccessToken(static::$accessToken);
    }

    public function testInstance()
    {
        $this->assertInstanceOf(GetMenuRequest::class, new GetMenuRequest());
    }

    public function testSetAgentId()
    {
        $this->request->setAgentId(AGENT_ID);
        $this->assertEquals(AGENT_ID, $this->request->getAgentId());

        return $this->request;
    }

    /**
     * @param GetMenuRequest $request
     * @depends testSetAgentId
     */
    public function testSend(GetMenuRequest $request)
    {
        $button1 = MenuItem::newViewMenuItem('链接菜单', 'http://www.yuandingbang.cn');
        $button2 = MenuItem::newEventMenuItem('click', '链接菜单', 'http://www.yuandingbang.cn');
        $buttons = [$button1, $button2];
        (new CreateMenuRequest())->setAccessToken(static::$accessToken)
                                 ->setButtons(AGENT_ID, $buttons)
                                 ->send();

        $result = $request->send();
        $this->assertTrue(is_array($result));
    }
}