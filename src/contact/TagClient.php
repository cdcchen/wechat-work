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

        return $request->send();
    }

    /**
     * @param int $id
     * @param string $name
     * @return bool
     */
    public function update(int $id, string $name): bool
    {
        return (new UpdateTagRequest())->setId($id)->setName($name)->send();
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return (new DeleteTagRequest())->setId($id)->send();
    }

    /**
     * @param int $id
     * @return array
     */
    public function getMembers(int $id): array
    {
        return (new GetTagMembersRequest())->setId($id)->send();
    }

    /**
     * @param int $id
     * @param array $userIds
     * @param array $partyIds
     * @return array
     */
    public function addMembers(int $id, array $userIds, array $partyIds): array
    {
        return (new TagAddMembersRequest())->setTagId($id)
                                           ->setUserList($userIds)
                                           ->setPartyList($partyIds)
                                           ->send();
    }

    /**
     * @param int $id
     * @param array $userIds
     * @param array $partyIds
     * @return array
     */
    public function deleteMembers(int $id, array $userIds, array $partyIds): array
    {
        return (new TagDeleteMembersRequest())->setTagId($id)
                                              ->setUserList($userIds)
                                              ->setPartyList($partyIds)
                                              ->send();
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        return (new TagListRequest())->send();
    }
}