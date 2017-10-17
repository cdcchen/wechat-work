<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 14:16
 */

namespace cdcchen\wework\base;


/**
 * Class AppCredential
 * @package cdcchen\wework\base
 */
class AppCredential implements \Serializable, \JsonSerializable
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $secret;

    /**
     * AppCredential constructor.
     * @param string $id
     * @param string $secret
     */
    public function __construct(string $id, string $secret)
    {
        $this->id = $id;
        $this->secret = $secret;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSecret(): string
    {
        return $this->secret;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return ['id' => $this->id, 'secret' => $this->getSecret()];
    }

    /**
     * @return string
     */
    public function serialize()
    {
        return serialize($this->toArray());
    }

    /**
     * @param string $serialized
     */
    public function unserialize($serialized)
    {
        $data = unserialize($serialized);
        $this->id = $data['id'] ?? null;
        $this->secret = $data['secret'] ?? null;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}