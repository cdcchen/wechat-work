<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 16:52
 */

namespace cdcchen\wework\contact;


use cdcchen\wework\base\ClientTrait;

class UserClient
{
    use ClientTrait;

    public function create(CreateUserRequest $request): bool
    {
        $this->request($request);
        return true;
    }

    public function get(string $userId): array
    {
        $request = new GetUserRequest();
        $request->setUserId($userId);
        $response = $this->request($request);
        $data = $response->getData();
        unset($data['errcode'], $data['errmsg']);

        return $data;
    }

    public function update(UpdateUserRequest $request): bool
    {
        $this->request($request);
        return true;
    }

    public function delete(string $userId): bool
    {
        $request = new DeleteUserRequest();
        $request->setUserId($userId);
        $this->request($request);
        return true;
    }

    public function batchDelete(array $userIdList): bool
    {
        $request = new BatchDeleteUserRequest();
        $request->setUserIdList($userIdList);
        $this->request($request);
        return true;
    }

    public function getSimpleList(int $departmentId, bool $fetchChild = false): array
    {
        $request = new UserSimpleListRequest();
        $request->setDepartmentId($departmentId)->setFetchChild($fetchChild);
        $response = $this->request($request);
        $data = $response->getData();

        return $data['userlist'];
    }

    public function getDetailList(int $departmentId, bool $fetchChild = false): array
    {
        $request = new UserDetailListRequest();
        $request->setDepartmentId($departmentId)->setFetchChild($fetchChild);
        $response = $this->request($request);
        $data = $response->getData();

        return $data['userlist'];
    }

    public function getOpenId(string $userId, string $agentId): array
    {
        $request = new ConvertToOpenIdRequest();
        $request->setUserId($userId)->setAgentId($agentId);
        $response = $this->request($request);
        $data = $response->getData();
        unset($data['errcode'], $data['errmsg']);

        return $data;
    }

    public function authSuccess(string $userId): array
    {
        $request = new UserAuthSuccessRequest();
        $request->setUserId($userId);
        $response = $this->request($request);
        $data = $response->getData();
        unset($data['errcode'], $data['errmsg']);

        return $data;
    }


}