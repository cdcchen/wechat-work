<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/16
 * Time: 13:43
 */

namespace cdcchen\wechat\work;


use cdcchen\wechat\common\ApiRequest;
use Fig\Http\Message\RequestMethodInterface;

/**
 * Class AccessTokenRequest
 * @package cdcchen\wechat\work
 */
class AccessTokenRequest extends ApiRequest
{
    /**
     * @var string
     */
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/gettoken';
    /**
     * @var string
     */
    protected $method = RequestMethodInterface::METHOD_GET;

    /**
     * @param string $id
     * @return AccessTokenRequest
     */
    public function setCorpId(string $id): self
    {
        $this->queryParams->set('corpid', $id);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCorpId(): ?string
    {
        return $this->queryParams->get('corpid');
    }

    /**
     * @param string $secret
     * @return AccessTokenRequest
     */
    public function setCorpSecret(string $secret): self
    {
        $this->queryParams->set('corpsecret', $secret);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getCorpSecret(): ?string
    {
        return $this->queryParams->get('corpsecret');
    }
}