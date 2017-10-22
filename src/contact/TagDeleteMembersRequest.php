<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 13:19
 */

namespace cdcchen\wework\msg;


use cdcchen\http\HttpResponse;
use cdcchen\wework\base\BaseRequest;
use Fig\Http\Message\RequestMethodInterface;

/**
 * Class TagDeleteMembersRequest
 * @package cdcchen\wework\msg
 */
class TagDeleteMembersRequest extends BaseRequest
{
    /**
     * @var string
     */
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/tag/deltagusers';
    /**
     * @var string
     */
    protected $method = RequestMethodInterface::METHOD_POST;

    /**
     * @param int $id
     * @return static
     */
    public function setTagId(int $id): self
    {
        $this->bodyParams->set('tagid', $id);
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTagId(): ?int
    {
        return $this->bodyParams->get('tagid');
    }

    /**
     * @param array $userIds
     * @return static
     */
    public function setUserList(array $userIds): self
    {
        $this->bodyParams->set('userlist', $userIds);
        return $this;
    }

    /**
     * @return array|null
     */
    public function getUserList(): ?array
    {
        return $this->bodyParams->get('userlist');
    }

    /**
     * @param array $userIds
     * @return static
     */
    public function setPartyList(array $userIds): self
    {
        $this->bodyParams->set('partylist', $userIds);
        return $this;
    }

    /**
     * @return array|null
     */
    public function getPartyList(): ?array
    {
        return $this->bodyParams->get('partylist');
    }


    /**
     * @param HttpResponse $response
     * @return array
     */
    protected function handleResponse(HttpResponse $response): array
    {
        $data = $response->getData();
        unset($data['errcode'], $data['errmsg']);

        return array_map(function ($value) {
            if ($value && is_string($value)) {
                return explode('|', $value);
            }
            return $value;
        }, $data);
    }

}