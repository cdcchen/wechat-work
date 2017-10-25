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
use cdcchen\wework\agent\MenuItem;
use cdcchen\wework\base\AccessToken;
use PHPUnit\Framework\TestCase;

class CreateMenuRequestTest extends TestCase
{
    static $accessToken;

    /**
     * @var CreateMenuRequest
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
        $this->request = (new CreateMenuRequest())->setAccessToken(static::$accessToken);
    }

    public function testInstance()
    {
        $this->assertInstanceOf(CreateMenuRequest::class, new CreateMenuRequest());
    }

    public function testSetButtons()
    {
        $button1 = MenuItem::newViewMenuItem('链接菜单', 'http://www.yuandingbang.cn');
        $button2 = MenuItem::newEventMenuItem('click', '链接菜单', 'http://www.yuandingbang.cn');
        $buttons = [$button1, $button2];
        $this->request->setButtons(AGENT_ID, $buttons);
        $this->assertEquals($buttons, $this->request->getButtons());

        return $this->request;
    }

    /**
     * @param CreateMenuRequest $request
     * @depends testSetButtons
     */
    public function testSetAgentId(CreateMenuRequest $request)
    {
        $this->assertEquals(AGENT_ID, $request->getAgentId());
    }

    /**
     * @param CreateMenuRequest $request
     * @depends testSetButtons
     */
    public function testSend(CreateMenuRequest $request)
    {
        $result = $request->send();
        $this->assertTrue($result);
    }
}