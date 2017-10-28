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
use cdcchen\psr7\HeaderCollection;
use cdcchen\psr7\MultipartStream;
use cdcchen\psr7\Uri;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
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
     * @var string
     */
    protected $format = Formatter::FORMAT_JSON;
    /**
     * @var StreamInterface
     */
    protected $body;

    /**
     * @var HeaderCollection
     */
    protected $headers;
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
        $this->headers = new HeaderCollection();
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
        if ($this->body === null) {
            $body = $this->bodyParams->isEmpty() ? null : $this->bodyParams->jsonEncode();
        } else {
            $body = $this->body;
            if ($body instanceof MultipartStream) {
                $this->headers->set('Content-Type', 'multipart/form-data; boundary=' . $body->getBoundary());
            }
        }
        return new HttpRequest($this->method, $this->getUri(), $this->headers, $body);
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
        if ($this->format) {
            $client->setFormat($this->format);
        }
        $response = $client->request($this->getRequest());
        if (!$response->isOK()) {
            throw new RequestException($response->getReasonPhrase(), $response->getStatusCode());
        }

        $data = $response->getData();
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