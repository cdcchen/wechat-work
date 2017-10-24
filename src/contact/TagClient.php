<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 20:32
 */

namespace cdcchen\wework\contact;


use cdcchen\wework\base\BaseClient;
use cdcchen\wework\msg\TagAddMembersRequest;
use cdcchen\wework\msg\TagDeleteMembersRequest;

/**
 * Class TagClient
 * @package cdcchen\wework\contact
 */
class TagClient extends BaseClient
{
    /**
     * @param string $name
     * @param int|null $id
     * @return int
     */
    public function create(string $name, int $id = null): int
    {
        $request = (new CreateTagRequest())->setName($name);
        if ($id !== null) {
            $request->setId($id);
        }

        return $this->send($request);
    }

    /**
     * @param int $id
     * @param string $name
     * @return bool
     */
    public function update(int $id, string $name): bool
    {
        return $this->send((new UpdateTagRequest())->setId($id)->setName($name));
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->send((new DeleteTagRequest())->setId($id));
    }

    /**
     * @param int $id
     * @return array
     */
    public function getMembers(int $id): array
    {
        return $this->send((new GetTagMembersRequest())->setId($id));
    }

    /**
     * @param int $id
     * @param array $userIds
     * @param array $partyIds
     * @return array
     */
    public function addMembers(int $id, array $userIds, array $partyIds): array
    {
        $request = (new TagAddMembersRequest())->setTagId($id)
                                               ->setUserList($userIds)
                                               ->setPartyList($partyIds);
        return $this->send($request);
    }

    /**
     * @param int $id
     * @param array $userIds
     * @param array $partyIds
     * @return array
     */
    public function deleteMembers(int $id, array $userIds, array $partyIds): array
    {
        $request = (new TagDeleteMembersRequest())->setTagId($id)
                                                  ->setUserList($userIds)
                                                  ->setPartyList($partyIds);
        return $this->send($request);
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        return $this->send((new TagListRequest()));
    }
}