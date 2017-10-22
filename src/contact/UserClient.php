<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 16:52
 */

namespace cdcchen\wework\contact;


use cdcchen\wework\base\BaseClient;

/**
 * Class UserClient
 * @package cdcchen\wework\contact
 */
class UserClient extends BaseClient
{
    /**
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        $request = (new CreateUserRequest())->setUserInfo($user);
        return $this->send($request);
    }

    /**
     * @param string $userId
     * @return array
     */
    public function getById(string $userId): array
    {
        $request = (new GetUserByIdRequest())->setUserId($userId);
        return $this->send($request);
    }

    /**
     * @param string $ticket
     * @return array
     */
    public function getByTicket(string $ticket): array
    {
        $request = (new GetUserByTicketRequest())->setUserTicket($ticket);
        return $this->send($request);
    }

    /**
     * @param string $code
     * @return array
     */
    public function getInfo(string $code): array
    {
        $request = (new GetUserInfoRequest())->setCode($code);
        return $this->send($request);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function update(User $user): bool
    {
        $request = (new UpdateUserRequest())->setUserInfo($user);
        return $this->send($request);
    }

    /**
     * @param string $userId
     * @return bool
     */
    public function delete(string $userId): bool
    {
        $request = (new DeleteUserRequest())->setUserId($userId);
        return $this->send($request);
    }

    /**
     * @param array $userIdList
     * @return bool
     */
    public function batchDelete(array $userIdList): bool
    {
        $request = (new BatchDeleteUserRequest())->setUserIdList($userIdList);
        return $this->send($request);
    }

    /**
     * @param int $departmentId
     * @param bool $fetchChild
     * @return array
     */
    public function getSimpleList(int $departmentId, bool $fetchChild = false): array
    {
        $request = new UserSimpleListRequest();
        $request->setDepartmentId($departmentId)->setFetchChild($fetchChild);
        return $this->send($request);
    }

    /**
     * @param int $departmentId
     * @param bool $fetchChild
     * @return array
     */
    public function getDetailList(int $departmentId, bool $fetchChild = false): array
    {
        $request = new UserDetailListRequest();
        $request->setDepartmentId($departmentId)->setFetchChild($fetchChild);
        return $this->send($request);
    }

    /**
     * @param string $userId
     * @param string $agentId
     * @return array
     */
    public function getOpenId(string $userId, string $agentId): array
    {
        $request = new UserIdToOpenIdRequest();
        $request->setUserId($userId)->setAgentId($agentId);
        return $this->send($request);
    }

    /**
     * @param string $userId
     * @return array
     */
    public function authSuccess(string $userId): array
    {
        $request = (new UserAuthSuccessRequest())->setUserId($userId);
        return $this->send($request);
    }
}