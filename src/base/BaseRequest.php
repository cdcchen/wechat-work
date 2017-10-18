<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/16
 * Time: 14:44
 */

namespace cdcchen\wework\base;


use cdcchen\http\Formatter;
use cdcchen\http\HttpClient;
use cdcchen\http\HttpRequest;
use cdcchen\http\HttpResponse;
use cdcchen\http\RequestException;
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
    protected $format = Formatter::FORMAT_JSON;

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
     * @return static
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

    /**
     * @return mixed
     * @throws RequestException
     * @throws RequestException
     * @throws ApiError
     */
    public function send()
    {
        $client = new HttpClient();
        $response = $client->setFormat($this->format)->request($this->getRequest());

        if (!$response->isOK()) {
            throw new RequestException($response->getReasonPhrase(), $response->getStatusCode());
        }

        $data = $response->getData();;
        if ($data !== null && ($errorCode = (int)$data['errcode']) !== ErrorCode::OK) {
            throw new ApiError($data['errmsg'], $errorCode);
        }

        return $this->handleResponse($response);
    }

    /**
     * @param HttpResponse $response
     * @return mixed
     */
    abstract protected function handleResponse(HttpResponse $response);
}