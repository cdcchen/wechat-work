<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/16
 * Time: 14:23
 */

namespace cdcchen\wework\agent;


use cdcchen\wework\base\BaseClient;

/**
 * Class AppClient
 * @package cdcchen\wework\agent
 */
class AgentClient extends BaseClient
{
    /**
     * @param int $agentId
     * @return array
     */
    public function getDetail(int $agentId): array
    {
        return $this->send((new AgentDetailRequest())->setAgentId($agentId));
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        return $this->send(new AgentListRequest());
    }

    /**
     * @param int $agentId
     * @param array $menuItems
     * @return bool
     */
    public function createMenu(int $agentId, array $menuItems): bool
    {
        $request = (new CreateMenuRequest())->setButtons($agentId, $menuItems);
        return $this->send($request);
    }

    /**
     * @param int $agentId
     * @return array
     */
    public function deleteMenu(int $agentId): array
    {
        return $this->send((new DeleteMenuRequest())->setAgentId($agentId));
    }

    /**
     * @param int $agentId
     * @return array
     */
    public function getMenu(int $agentId): array
    {
        return $this->send((new GetMenuRequest())->setAgentId($agentId));
    }

    /**
     * @param int $agentId
     * @param array $attributes
     * @return bool
     */
    public function update(int $agentId, array $attributes): bool
    {
        $request = (new UpdateAgentRequest())->setAttributes($agentId, $attributes);
        $this->send($request);
    }
}