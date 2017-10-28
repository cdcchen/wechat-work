<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/28
 * Time: 12:24
 */

namespace msg;


use cdcchen\wework\msg\ImageMessage;
use cdcchen\wework\msg\Message;
use PHPUnit\Framework\TestCase;

/**
 * Class ImageMessageTest
 * @package msg
 */
class ImageMessageTest extends TestCase
{
    /**
     * @return ImageMessage
     */
    public function testInstance()
    {
        $msg = new ImageMessage();
        $this->assertInstanceOf(ImageMessage::class, $msg);

        return $msg;
    }

    /**
     * @param ImageMessage $msg
     * @depends testInstance
     */
    public function testMsgType(ImageMessage $msg)
    {
        $this->assertEquals(Message::TYPE_IMAGE, $msg->getMsgType());
    }

    /**
     * @param ImageMessage $msg
     * @depends testInstance
     */
    public function testSetMediaId(ImageMessage $msg)
    {
        $mediaId = 'askdfasd9wnwmkevnoiwefjnwelvwfkwefw0sadfj';
        $msg->setMediaId($mediaId);

        $this->assertEquals($mediaId, $msg->getMediaId());
    }
}