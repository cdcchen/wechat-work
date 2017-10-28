<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/28
 * Time: 12:24
 */

namespace msg;


use cdcchen\wework\msg\FileMessage;
use cdcchen\wework\msg\Message;
use PHPUnit\Framework\TestCase;

/**
 * Class FileMessageTest
 * @package msg
 */
class FileMessageTest extends TestCase
{
    /**
     * @return FileMessage
     */
    public function testInstance()
    {
        $msg = new FileMessage();
        $this->assertInstanceOf(FileMessage::class, $msg);

        return $msg;
    }

    /**
     * @param FileMessage $msg
     * @depends testInstance
     */
    public function testMsgType(FileMessage $msg)
    {
        $this->assertEquals(Message::TYPE_FILE, $msg->getMsgType());
    }

    /**
     * @param FileMessage $msg
     * @depends testInstance
     */
    public function testSetMediaId(FileMessage $msg)
    {
        $mediaId = 'askdfasd9wnwmkevnoiwefjnwelvwfkwefw0sadfj';
        $msg->setMediaId($mediaId);

        $this->assertEquals($mediaId, $msg->getMediaId());
    }
}