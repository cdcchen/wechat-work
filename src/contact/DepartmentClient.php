<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/17
 * Time: 20:32
 */

namespace cdcchen\wework\contact;


use cdcchen\wework\base\BaseClient;

/**
 * Class DepartmentClient
 * @package cdcchen\wework\contact
 */
class DepartmentClient extends BaseClient
{
    /**
     * @param string $name
     * @param int $parentId
     * @param int|null $order
     * @param string|null $id
     * @return int
     */
    public function create(string $name, int $parentId = 0, int $order = null, string $id = null): int
    {
        $request = (new CreateDepartmentRequest())->setName($name)->setParentId($parentId);
        if ($order !== null) {
            $request->setOrder($order);
        }

        if ($id !== null) {
            $request->setId($id);
        }

        return $request->send();
    }

    /**
     * @param int $id
     * @param string|null $name
     * @param int|null $parentId
     * @param int|null $order
     * @return bool
     */
    public function update(int $id, string $name = null, int $parentId = null, int $order = null): bool
    {
        $request = (new UpdateDepartmentRequest())->setId($id);
        if ($name !== '' && $name !== null) {
            $request->setName($name);
        }
        if ($parentId !== null) {
            $request->setParentId($parentId);
        }
        if ($order !== null) {
            $request->setOrder($order);
        }

        return $request->send();
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return (new DeleteDepartmentRequest())->setId($id)->send();
    }

    /**
     * @param int $id
     * @return array
     */
    public function getList(int $id): array
    {
        return (new DepartmentListRequest())->setId($id)->send();
    }
}