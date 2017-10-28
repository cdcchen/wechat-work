<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/28
 * Time: 12:24
 */

namespace msg;


use cdcchen\wework\msg\VoiceMessage;
use cdcchen\wework\msg\Message;
use PHPUnit\Framework\TestCase;

/**
 * Class VoiceMessageTest
 * @package msg
 */
class VoiceMessageTest extends TestCase
{
    /**
     * @return VoiceMessage
     */
    public function testInstance()
    {
        $msg = new VoiceMessage();
        $this->assertInstanceOf(VoiceMessage::class, $msg);

        return $msg;
    }

    /**
     * @param VoiceMessage $msg
     * @depends testInstance
     */
    public function testMsgType(VoiceMessage $msg)
    {
        $this->assertEquals(Message::TYPE_VOICE, $msg->getMsgType());
    }

    /**
     * @param VoiceMessage $msg
     * @depends testInstance
     */
    public function testSetMediaId(VoiceMessage $msg)
    {
        $mediaId = 'askdfasd9wnwmkevnoiwefjnwelvwfkwefw0sadfj';
        $msg->setMediaId($mediaId);

        $this->assertEquals($mediaId, $msg->getMediaId());
    }
}