<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 17:45
 */

namespace cdcchen\wechat\work\contact;


use cdcchen\wework\base\BaseRequest;

class BatchDeleteUserRequest extends BaseRequest
{
    public function setUserIdList(array $list): self
    {
        $this->queryParams->set('useridlist', $list);
        return $this;
    }

    public function getUserIdList(): ?array
    {
        return $this->queryParams->get('useridlist');
    }
}