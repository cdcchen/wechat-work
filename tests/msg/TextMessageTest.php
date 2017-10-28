<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/28
 * Time: 12:24
 */

namespace msg;


use cdcchen\wework\msg\TextMessage;
use cdcchen\wework\msg\Message;
use PHPUnit\Framework\TestCase;

/**
 * Class TextMessageTest
 * @package msg
 */
class TextMessageTest extends TestCase
{
    /**
     * @return TextMessage
     */
    public function testInstance()
    {
        $msg = new TextMessage();
        $this->assertInstanceOf(TextMessage::class, $msg);

        return $msg;
    }

    /**
     * @param TextMessage $msg
     * @depends testInstance
     */
    public function testMsgType(TextMessage $msg)
    {
        $this->assertEquals(Message::TYPE_TEXT, $msg->getMsgType());
    }

    /**
     * @param TextMessage $msg
     * @depends testInstance
     */
    public function testSetContent(TextMessage $msg)
    {
        $content = 'askdfasd9wnwmkevnoiwefjnwelvwfkwefw0sadfj';
        $msg->setContent($content);

        $this->assertEquals($content, $msg->getContent());
    }
}