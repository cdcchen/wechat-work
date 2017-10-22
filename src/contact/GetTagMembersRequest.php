<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 19:41
 */

namespace cdcchen\wework\contact;


use cdcchen\http\HttpResponse;
use cdcchen\wework\base\BaseRequest;
use Fig\Http\Message\RequestMethodInterface;

/**
 * Class GetTagMembersRequest
 * @package cdcchen\wework\contact
 */
class GetTagMembersRequest extends BaseRequest
{
    /**
     * @var string
     */
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/tag/get';
    /**
     * @var string
     */
    protected $method = RequestMethodInterface::METHOD_GET;

    /**
     * @param int $id
     * @return static
     */
    public function setId(int $id): self
    {
        $this->bodyParams->set('id', $id);
        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->bodyParams->get('id');
    }

    /**
     * @param HttpResponse $response
     * @return array
     */
    protected function handleResponse(HttpResponse $response): array
    {
        $data = $response->getData();
        unset($data['errcode'], $data['errmsg']);
        return $data;
    }
}