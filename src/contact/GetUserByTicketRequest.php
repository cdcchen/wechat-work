<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 17:41
 */

namespace cdcchen\wework\contact;


use cdcchen\http\HttpResponse;
use cdcchen\wework\base\BaseRequest;
use Fig\Http\Message\RequestMethodInterface;

/**
 * Class GetUserByTicketRequest
 * @package cdcchen\wework\contact
 */
class GetUserByTicketRequest extends BaseRequest
{
    /**
     * @var string
     */
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/user/getuserdetail';
    /**
     * @var string
     */
    protected $method = RequestMethodInterface::METHOD_POST;

    /**
     * @param string $ticket
     * @return static
     */
    public function setUserTicket(string $ticket): self
    {
        $this->bodyParams->set('user_ticket', $ticket);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getUserTicket(): ?string
    {
        return $this->bodyParams->get('user_ticket');
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