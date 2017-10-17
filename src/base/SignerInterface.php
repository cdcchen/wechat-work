<?php
namespace cdcchen\wechat\base;


/**
 * Interface SignerInterface
 * @package cdcchen\wechat\base
 */
interface SignerInterface
{
    /**
     * Signature method HMAC-SHA1
     */
    const HMAC_SHA1 = 'HMAC-SHA1';
    /**
     * Signature method HMAC-SHA1
     */
    const HMAC_SHA256 = 'HMAC-SHA256';

    /**
     * @return string
     */
    public function getSignatureMethod(): string;

    /**
     * @return string
     */
    public function getSignatureVersion(): string;

    /**
     * @param string $source
     * @param string $accessSecret
     * @return string
     */
    public function buildSignature($source, $accessSecret): string;
}