<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 11:59
 */

namespace cdcchen\wework\base;


/**
 * Class BaseClient
 * @package cdcchen\wework\base
 */
abstract class BaseClient
{
    /**
     * @var string
     */
    protected $accessToken;

    /**
     * BaseClient constructor.
     * @param string|null $accessToken
     */
    public function __construct(string $accessToken = null)
    {
        if ($accessToken !== null) {
            $this->accessToken = $accessToken;
        }
    }

    /**
     * @param string $accessToken
     * @return static
     */
    public function setAccessToken(string $accessToken): self
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    /**
     * @param BaseRequest $request
     * @return mixed
     */
    public function send(BaseRequest $request)
    {
        return $request->setAccessToken($this->accessToken)->send();
    }
}