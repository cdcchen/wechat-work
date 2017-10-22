<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/22
 * Time: 19:20
 */

namespace cdcchen\wework\cb;


use cdcchen\http\XmlParser;
use cdcchen\wework\base\CallbackCredential;
use cdcchen\wework\base\PrpCrypt;

/**
 * Class CallbackClient
 * @package cdcchen\wework\cb
 */
class CallbackClient
{
    /**
     * @var string
     */
    protected $corpId;
    /**
     * @var CallbackCredential
     */
    protected $credential;

    /**
     * CallbackClient constructor.
     * @param string $corpId
     * @param CallbackCredential $credential
     */
    public function __construct(string $corpId, CallbackCredential $credential)
    {
        $this->corpId = $corpId;
        $this->credential = $credential;
    }

    /**
     * @param string $msgSignature
     * @param string $echoStr
     * @param string $nonce
     * @param int $timestamp
     * @return string
     * @throws \Exception
     */
    public function verify(string $msgSignature, string $echoStr, string $nonce, int $timestamp): string
    {
        if ($this->checkSignature($msgSignature, $echoStr, $nonce, $timestamp)) {
            $crypt = new PrpCrypt($this->credential->getEncodingAesKey());
            return $crypt->decrypt($echoStr);
        }

        throw new \Exception('signature error.');
    }

    /**
     * @param $msgSignature
     * @param string $encrypted
     * @param string $nonce
     * @param int $timestamp
     * @return bool
     */
    public function checkSignature($msgSignature, string $encrypted, string $nonce, int $timestamp): bool
    {
        $actualSignature = CallbackCredential::getSHA1($this->credential->getToken(), $timestamp, $nonce, $encrypted);
        return $msgSignature === $actualSignature;
    }

    /**
     * @param $content
     * @return string
     */
    public function encrypt($content): string
    {
        $timestamp = time();
        $nonce = uniqid(microtime(true), true);
        $signature = CallbackCredential::getSHA1($this->credential->getToken(), $timestamp, $nonce, $content);
        $encrypted = (new PrpCrypt($this->credential->getEncodingAesKey()))->encrypt($content, $this->corpId);

        return '<Xml>'
            . "<Encrypt><![CDATA[{$encrypted}]]></Encrypt>"
            . "<MsgSignature><![CDATA[{$signature}]]></MsgSignature>"
            . "<TimeStamp>{$timestamp}</TimeStamp>"
            . "<Nonce><![CDATA[{$nonce}]]></Nonce>"
            . '</Xml>';
    }

    /**
     * @param string $encrypted
     * @return PushMessage
     */
    public function decrypt(string $encrypted): PushMessage
    {
        $decrypted = (new PrpCrypt($this->credential->getEncodingAesKey()))->decrypt($encrypted);
        $attributes = XmlParser::xmlToArray($decrypted);

        return new PushMessage($attributes);
    }

    /**
     * @param string $body
     * @return PushMessage
     */
    public function decryptBody(string $body): PushMessage
    {
        $attributes = XmlParser::xmlToArray($body);
        $encrypted = $attributes['Encrypt'];
        return $this->decrypt($encrypted);
    }
}