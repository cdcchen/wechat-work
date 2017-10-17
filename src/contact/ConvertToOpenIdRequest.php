<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 17:49
 */

namespace cdcchen\wechat\work\contact;


use cdcchen\wework\base\BaseRequest;

class ConvertToOpenIdRequest extends BaseRequest
{
    public function setUserId(string $id): self
    {
        $this->queryParams->set('userid', $id);
        return $this;
    }

    public function getUserId(): ?string
    {
        return $this->queryParams->get('userid');
    }

    public function setAgentId(string $id): self
    {
        $this->queryParams->set('agentid', $id);
        return $this;
    }

    public function getAgentId(): ?string
    {
        return $this->queryParams->get('agentid');
    }
}