<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/16
 * Time: 13:40
 */

namespace cdcchen\wechat\work;


use cdcchen\http\Formatter;
use cdcchen\http\HttpResponse;
use cdcchen\wechat\common\AccessToken;
use cdcchen\wechat\common\ApiClient;
use cdcchen\wechat\common\ApiException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AccessTokenClient
 * @package cdcchen\wechat\work
 */
class AccessTokenClient extends ApiClient
{
    /**
     * @var string
     */
    protected $corpId;
    /**
     * @var string
     */
    protected $corpSecret;

    /**
     * AccessTokenClient constructor.
     * @param string $corpId
     * @param string $corpSecret
     */
    public function __construct(string $corpId, string $corpSecret)
    {
        $this->corpId = $corpId;
        $this->corpSecret = $corpSecret;
    }

    /**
     * @param ResponseInterface|HttpResponse $response
     * @return AccessToken
     * @throws ApiException
     */
    protected function handleResponse(ResponseInterface $response): AccessToken
    {
        $data = $response->getData();

        if ($data['errcode'] == 0) {
            return new AccessToken($data['access_token'], $data['expires_in']);
        }

        throw new ApiException($data['errmsg'], $data['errcode']);
    }

    /**
     * @return AccessToken
     * @throws ApiException
     */
    public function getToken(): AccessToken
    {
        $request = new AccessTokenRequest();
        $request->setCorpId($this->corpId)->setCorpSecret($this->corpSecret);

        return $this->request($request);
    }
}