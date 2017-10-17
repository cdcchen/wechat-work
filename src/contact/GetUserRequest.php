<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 17:41
 */

namespace cdcchen\wework\contact;


use cdcchen\wework\base\BaseRequest;

class GetUserRequest extends BaseRequest
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
}