<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/22
 * Time: 17:47
 */

namespace cdcchen\wework\msg;


use cdcchen\wework\AccessTokenRequest;
use cdcchen\wework\base\AccessToken;

/**
 * Class AppClient
 * @package cdcchen\wework\msg
 */
class AppClient
{
    /**
     * @param string $corpId
     * @param string $corpSecret
     * @return AccessToken
     */
    public static function getAccessToken(string $corpId, string $corpSecret): AccessToken
    {
        return (new AccessTokenRequest())->setCredential($corpId, $corpSecret)->send();
    }

    /**
     * @param string $corpId
     * @param string $redirectUrl
     * @param int $agentId
     * @param string $scope See AuthorizeScope
     * @param string|null $state
     * @return string
     */
    public static function authorizeUrl(
        string $corpId,
        string $redirectUrl,
        int $agentId,
        string $scope,
        string $state = null
    ): string {
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$corpId}&redirect_uri={$redirectUrl}&response_type=code&scope={$scope}&agentid={$agentId}";
        if ($state !== null) {
            $url .= "&state={$state}";
        }
        $url .= '#wechat_redirect';

        return $url;
    }

    /**
     * @param string $corpId
     * @param string $redirectUrl
     * @param int $agentId
     * @param string|null $state
     * @return string
     */
    public static function ssoUrl(
        string $corpId,
        string $redirectUrl,
        int $agentId,
        string $state = null
    ): string {
        $url = "https://open.work.weixin.qq.com/wwopen/sso/qrConnect?appid={$corpId}&agentid={$agentId}&redirect_uri={$redirectUrl}";
        if ($state !== null) {
            $url .= "&state={$state}";
        }
        return $url;
    }
}