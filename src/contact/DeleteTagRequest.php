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
 * Class DeleteTagRequest
 * @package cdcchen\wework\contact
 */
class DeleteTagRequest extends BaseRequest
{
    /**
     * @var string
     */
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/tag/delete';
    /**
     * @var string
     */
    protected $method = RequestMethodInterface::METHOD_POST;

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
     * @return bool
     */
    protected function handleResponse(HttpResponse $response): bool
    {
        return true;
    }
}