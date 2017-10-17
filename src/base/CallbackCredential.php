<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 16/6/17
 * Time: 12:37
 */

namespace cdcchen\wework\base;


/**
 * Class CallbackCredential
 * @package cdcchen\wework\auth
 */
class CallbackCredential
{
    /**
     * @var string
     */
    private $url;
    /**
     * @var string
     */
    private $token;
    /**
     * @var string
     */
    private $encodingAesKey;

    /**
     * CallbackCredential constructor.
     * @param string $url
     * @param string $token
     * @param string $encodingAesKey
     */
    public function __construct($url, $token, $encodingAesKey)
    {
        if (empty($url) || empty($token) || empty($encodingAesKey)) {
            throw new \InvalidArgumentException('Url|Token|EncodingAesKey is required.');
        }

        $this->url = $url;
        $this->token = $token;
        $this->encodingAesKey = $encodingAesKey;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getEncodingAesKey()
    {
        return $this->encodingAesKey;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'url' => $this->url,
            'token' => $this->token,
            'encoding_aes_key' => $this->encodingAesKey,
        ];
    }

    /**
     * @param string $token
     * @param string $timestamp
     * @param string $nonce
     * @param string $encrypt_msg
     * @return string
     */
    public static function getSHA1($token, $timestamp, $nonce, $encrypt_msg)
    {
        $params = [$encrypt_msg, $token, $timestamp, $nonce];
        sort($params, SORT_STRING);
        $str = implode('', $params);

        return sha1($str);
    }
}