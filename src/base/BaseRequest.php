<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/16
 * Time: 14:44
 */

namespace cdcchen\wework\base;


use cdcchen\http\HttpRequest;
use cdcchen\psr7\Uri;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Class ApiRequest
 * @package cdcchen\wework\base
 */
abstract class BaseRequest
{
    /**
     * @var string
     */
    protected $apiUri;
    /**
     * @var string
     * @see RequestMethodInterface
     */
    protected $method;

    /**
     * @var AttributeArray
     */
    protected $queryParams;
    /**
     * @var AttributeArray
     */
    protected $bodyParams;

    /**
     * ApiRequest constructor.
     */
    public function __construct()
    {
        $this->queryParams = new AttributeArray();
        $this->bodyParams = new AttributeArray();
    }

    /**
     * @param string $accessToken
     * @return BaseRequest
     */
    public function setAccessToken(string $accessToken): self
    {
        $this->queryParams->set('access_token', $accessToken);
        return $this;
    }

    /**
     * @return string
     */
    public function getAccessToken(): ?string
    {
        return $this->queryParams->get('access_token');
    }

    /**
     * @return UriInterface
     */
    public function getUri(): UriInterface
    {
        return (new Uri($this->apiUri))->withQuery($this->queryParams->urlEncode());
    }

    /**
     * @return RequestInterface
     */
    public function getRequest(): RequestInterface
    {
        return new HttpRequest($this->method, $this->getUri(), null, $this->bodyParams->jsonEncode());
    }
}