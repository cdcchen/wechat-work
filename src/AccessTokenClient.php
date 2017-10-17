<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/16
 * Time: 13:40
 */

namespace cdcchen\wework;


use cdcchen\wework\base\AccessToken;
use cdcchen\wework\base\ApiException;
use cdcchen\wework\base\AppCredential;
use cdcchen\wework\base\ClientTrait;

/**
 * Class AccessTokenClient
 * @package cdcchen\wework
 */
class AccessTokenClient
{
    use ClientTrait;

    /**
     * @var AppCredential
     */
    protected $credential;

    public function __construct(AppCredential $credential)
    {
        $this->credential = $credential;
    }

    /**
     * @param AppCredential $credential
     */
    public function setCredential(AppCredential $credential): void
    {
        $this->credential = $credential;
    }

    /**
     * @return AppCredential|null
     */
    public function getCredential(): ?AppCredential
    {
        return $this->credential;
    }

    /**
     * @return AccessToken
     * @throws ApiException
     */
    public function getToken(): AccessToken
    {
        $request = new AccessTokenRequest();
        $request->setCorpId($this->credential->getId())->setCorpSecret($this->credential->getSecret());
        $response = $this->request($request);
        $data = $response->getData();

        return new AccessToken($data['access_token'], $data['expires_in']);
    }
}