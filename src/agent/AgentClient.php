<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/16
 * Time: 14:23
 */

namespace cdcchen\wechat\work;


use cdcchen\wechat\common\AccessToken;
use cdcchen\wechat\common\AppCredential;
use cdcchen\wechat\common\ClientTrait;

/**
 * Class AppClient
 * @package cdcchen\wechat\work
 */
class AgentClient
{
    use ClientTrait;

    /**
     * @var string
     */
    protected $corpId;
    /**
     * @var string
     */
    protected $corpSecret;

    /**
     * AppClient constructor.
     * @param string $corpId
     * @param string $corpSecret
     */
    public function __construct(string $corpId, string $corpSecret)
    {
        $this->corpId = $corpId;
        $this->corpSecret = $corpSecret;
    }

    /**
     * @return AccessToken
     */
    public function getAccessToken(): AccessToken
    {
        $client = new AccessTokenClient(new AppCredential($this->corpId, $this->corpSecret));
        return $client->getToken();
    }
}