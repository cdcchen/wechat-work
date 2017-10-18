<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/16
 * Time: 13:43
 */

namespace cdcchen\wework;


use cdcchen\http\HttpResponse;
use cdcchen\wework\base\AccessToken;
use cdcchen\wework\base\BaseRequest;
use Fig\Http\Message\RequestMethodInterface;

/**
 * Class AccessTokenRequest
 * @package cdcchen\wework
 */
class AccessTokenRequest extends BaseRequest
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
     * @param string $secret
     * @return AccessTokenRequest
     */
    public function setCredential(string $id, string $secret): self
    {
        $this->queryParams->set('corpid', $id);
        $this->queryParams->set('corpsecret', $secret);
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
     * @return null|string
     */
    public function getCorpSecret(): ?string
    {
        return $this->queryParams->get('corpsecret');
    }

    protected function handleResponse(HttpResponse $response): AccessToken
    {
        $data = $response->getData();
        return new AccessToken($data['access_token'], $data['expires_in']);
    }
}