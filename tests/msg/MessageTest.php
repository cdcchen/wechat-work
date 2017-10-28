<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/28
 * Time: 11:53
 */

namespace msg;


use cdcchen\wework\msg\Message;
use PHPUnit\Framework\TestCase;

/**
 * Class MessageTest
 * @package msg
 */
class MessageTest extends TestCase
{
    /**
     * @return Message
     */
    public function testInstance()
    {
        $msg = new Message();
        $this->assertInstanceOf(Message::class, $msg);

        return $msg;
    }

    /**
     * @param Message $msg
     * @return Message
     * @depends testInstance
     */
    public function testSetAgentId(Message $msg)
    {
        $msg->setAgentId(AGENT_ID);
        $this->assertEquals(AGENT_ID, $msg->getAgentId());

        return $msg;
    }

    /**
     * @param Message $msg
     * @return Message
     * @depends testSetAgentId
     */
    public function testSetToUser(Message $msg)
    {
        $userIds = ['user1', 'user2'];
        $msg->setToUser($userIds);
        $this->assertEquals($userIds, $msg->getToUser());

        return $msg;
    }

    /**
     * @param Message $msg
     * @return Message
     * @depends testSetToUser
     */
    public function testAppendUser(Message $msg)
    {
        $msg->appendToUser('user3');
        $this->assertEquals(['user1', 'user2', 'user3'], $msg->getToUser());

        return $msg;
    }

    /**
     * @param Message $msg
     * @return Message
     * @depends testAppendUser
     */
    public function testSetToParty(Message $msg)
    {
        $partyIds = [100, 200];
        $msg->setToParty($partyIds);
        $this->assertEquals($partyIds, $msg->getToParty());

        return $msg;
    }

    /**
     * @param Message $msg
     * @return Message
     * @depends testSetToParty
     */
    public function testAppendParty(Message $msg)
    {
        $msg->appendToParty(300);
        $this->assertEquals([100, 200, 300], $msg->getToParty());

        return $msg;
    }

    /**
     * @param Message $msg
     * @return Message
     * @depends testAppendParty
     */
    public function testSetToTag(Message $msg)
    {
        $tagIds = [100, 200];
        $msg->setToTag($tagIds);
        $this->assertEquals($tagIds, $msg->getToTag());

        return $msg;
    }

    /**
     * @param Message $msg
     * @return Message
     * @depends testSetToTag
     */
    public function testAppendTag(Message $msg)
    {
        $msg->appendToTag(300);
        $this->assertEquals([100, 200, 300], $msg->getToTag());

        return $msg;
    }

    /**
     * @param Message $msg
     * @return Message
     * @depends testAppendTag
     */
    public function testSetMsgType(Message $msg)
    {
        $msg->setMsgType(Message::TYPE_TEXT);
        $this->assertEquals(Message::TYPE_TEXT, $msg->getMsgType());

        return $msg;
    }

    /**
     * @param Message $msg
     * @return Message
     * @depends testSetMsgType
     */
    public function testSetSafe(Message $msg)
    {
        $msg->setSafe(true);
        $this->assertEquals(1, $msg->getSafe());

        return $msg;
    }

    /**
     * @param Message $msg
     * @depends testSetSafe
     */
    public function testToArray(Message $msg)
    {
        $attributes = [
            'agentid' => AGENT_ID,
            'touser' => 'user1|user2|user3',
            'toparty' => '100|200|300',
            'totag' => '100|200|300',
            'msgtype' => 'text',
            'safe' => 1,
        ];

        $this->assertEquals($attributes, $msg->toArray());
    }
}