<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/16
 * Time: 14:23
 */

namespace cdcchen\wechat\work;


use cdcchen\http\Formatter;
use cdcchen\http\HttpResponse;
use cdcchen\wechat\common\AccessToken;
use cdcchen\wechat\common\ApiClient;
use cdcchen\wechat\common\ApiException;
use cdcchen\wechat\common\ApiRequest;
use Psr\Http\Message\ResponseInterface;

class WorkClient extends ApiClient
{
    protected $corpId;
    protected $corpSecret;

    public function __construct(string $corpId, string $corpSecret)
    {
        $this->corpId = $corpId;
        $this->corpSecret = $corpSecret;
    }

    /**
     * @param ResponseInterface|HttpResponse $response
     * @return string
     */
    protected function handleResponse(ResponseInterface $response)
    {
        $response->setFormat(Formatter::FORMAT_JSON);
        return $response->getData();
    }

    /**
     * @return AccessToken
     * @throws ApiException
     */
    public function getAccessToken(): AccessToken
    {
        $client = new AccessTokenClient($this->corpId, $this->corpSecret);
        return $client->getToken();
    }

    public function getClient(string $requestClassName)
    {
        /**
         * @var ApiRequest $request
         */
        $request = new $requestClassName;
        $request->setAccessToken($this->getAccessToken());

        return $this->request($request);
    }
}