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
    public function te2stGetAccessToken()
    {
        $token = AppClient::getAccessToken(CORP_ID, CORP_SECRET);
        $this->assertInstanceOf(AccessToken::class, $token);
    }

    public function testGetAccessTokenThrownApiError()
    {
        $this->expectException(ApiError::class);
        AppClient::getAccessToken(CORP_ID, 'invalid secret');
    }
}