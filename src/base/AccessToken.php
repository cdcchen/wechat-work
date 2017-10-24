<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/16
 * Time: 21:31
 */

namespace cdcchen\wework\base;


/**
 * Class AccessToken
 * @package cdcchen\wework\base
 */
class AccessToken implements \JsonSerializable, \Serializable
{
    /**
     * @var string
     */
    private $token;
    /**
     * @var int
     */
    private $expires;
    /**
     * @var int
     */
    private $createdTime;

    /**
     * AccessToken constructor.
     * @param string $token
     * @param int $expires
     */
    public function __construct(string $token, int $expires)
    {
        $this->token = $token;
        $this->expires = $expires;
        $this->createdTime = time();
    }

    /**
     * @return null|string
     */
    public function getToken(): ?string
    {
        if ($this->isExpired()) {
            $this->token = null;
        }

        return $this->token;
    }

    /**
     * @return int|null
     */
    public function getExpires(): ?int
    {
        return $this->expires;
    }

    /**
     * @return int
     */
    public function getCreatedTime(): int
    {
        return $this->createdTime;
    }

    /**
     * @return bool
     */
    public function isExpired(): bool
    {
        return time() - $this->createdTime > $this->expires;
    }

    /**
     * @return string
     */
    public function serialize()
    {
        $data = [
            'token' => $this->token,
            'expires' => $this->expires,
            'createdTime' => $this->createdTime,
        ];

        return serialize($data);
    }

    /**
     * @param string $serialized
     */
    public function unserialize($serialized)
    {
        $data = unserialize($serialized);

        $this->token = $data['token'] ?? null;
        $this->expires = $data['expires'] ?? null;
        $this->createdTime = $data['createdTime'] ?? null;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'token' => $this->token,
            'expires' => $this->expires,
            'createdTime' => $this->createdTime,
        ];
    }
}