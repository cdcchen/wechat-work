<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/16
 * Time: 14:23
 */

namespace cdcchen\wechat\work;


use cdcchen\wechat\common\ApiClient;
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

    protected function handleResponse(ResponseInterface $response)
    {
        return $response->getBody()->getContents();
    }

    public function getAccessToken()
    {
        $request = new AccessTokenRequest();
        $request->setCorpId($this->corpId)->setCorpSecret($this->corpSecret);

        return $this->request($request);
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