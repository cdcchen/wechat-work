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
     * @var
     */
    protected $agentId;

    /**
     * BaseClient constructor.
     * @param string|null $accessToken
     * @param string|null $agentId
     */
    public function __construct(string $accessToken = null, string $agentId = null)
    {
        if ($accessToken !== null) {
            $this->accessToken = $accessToken;
        }
        if (!empty($agentId)) {
            $this->agentId = $agentId;
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
     * @param string $agentId
     * @return $this
     */
    public function setAgentId(string $agentId): self
    {
        $this->agentId = $agentId;
        return  $this;
    }

    /**
     * @return string|null
     */
    public function getAgentId(): ?string
    {
        return  $this->agentId;
    }

    /**
     * @param BaseRequest $request
     * @return mixed
     * @throws \cdcchen\http\RequestException
     */
    public function send(BaseRequest $request)
    {
        return $request->setAccessToken($this->accessToken)->send();
    }
}
