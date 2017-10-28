<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/27
 * Time: 14:52
 */

use cdcchen\wework\AppClient;
use cdcchen\wework\base\AccessToken;
use PHPUnit\Framework\TestCase;
use cdcchen\wework\base\ApiError;

class AppClientTest extends TestCase
{
    public function testGetAccessToken()
    {
        $token = AppClient::getAccessToken(CORP_ID, CORP_SECRET);
        $this->assertInstanceOf(AccessToken::class, $token);
    }

    public function testGetAccessTokenThrownApiError()
    {
        $this->expectException(ApiError::class);
        AppClient::getAccessToken(CORP_ID, 'invalid secret');
    }

    public function testAuthorizeUrl()
    {
        $corpId = CORP_ID;
        $agentId = AGENT_ID;
        $redirectUrl = 'http://github.com';
        $scope = microtime(true);
        $state = __METHOD__;
        $expected = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$corpId}&redirect_uri={$redirectUrl}&response_type=code&scope={$scope}&agentid={$agentId}";
        $expected .= "&state={$state}#wechat_redirect";

        $this->assertEquals($expected, AppClient::authorizeUrl($corpId, $redirectUrl, $agentId, $scope, $state));
    }

    public function testSsoUrl()
    {
        $corpId = CORP_ID;
        $agentId = AGENT_ID;
        $redirectUrl = 'http://github.com';
        $state = __METHOD__;
        $expected = "https://open.work.weixin.qq.com/wwopen/sso/qrConnect?appid={$corpId}&agentid={$agentId}&redirect_uri={$redirectUrl}";
        $expected .= "&state={$state}";

        $this->assertEquals($expected, AppClient::ssoUrl($corpId, $redirectUrl, $agentId, $state));
    }
}