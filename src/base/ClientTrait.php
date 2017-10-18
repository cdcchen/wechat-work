<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/16
 * Time: 12:15
 */

namespace cdcchen\wework\base;


use cdcchen\http\Formatter;
use cdcchen\http\HttpClient;
use cdcchen\http\HttpResponse;
use cdcchen\http\RequestException;

/**
 * trait ClientTrait
 * @package cdcchen\wework\base
 */
trait ClientTrait
{
    /**
     * @param BaseRequest $request
     * @return HttpResponse
     * @throws RequestException
     * @throws ApiError
     */
    public function request(BaseRequest $request)
    {
        $client = new HttpClient();
        $response = $client->setFormat(Formatter::FORMAT_JSON)->request($request->getRequest());

        if (!$response->isOK()) {
            throw new RequestException($response->getReasonPhrase(), $response->getStatusCode());
        }
        $response->setFormat(Formatter::FORMAT_JSON);
        $data = $response->getData();

        if (($errorCode = (int)$data['errcode']) === 0) {
            return $response;
        }

        throw new ApiError($data['errmsg'], $errorCode);
    }
}