<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 17:46
 */

namespace cdcchen\wework\contact;


use cdcchen\wework\base\BaseRequest;

class UserSimpleListRequest extends BaseRequest
{
    public function setDepartmentId(int $id): self
    {
        $this->queryParams->set('department_id', $id);
        return $this;
    }

    public function getDepartmentId()
    {
        return $this->queryParams->get('department_id');
    }

    public function setFetchChild(bool $flag): self
    {
        $this->queryParams->set('fetch_child', (int)$flag);
        return $this;
    }

    public function getFetchChild()
    {
        return $this->queryParams->get('fetch_child');
    }
}