<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/28
 * Time: 12:24
 */

namespace msg;


use cdcchen\wework\msg\Message;
use cdcchen\wework\msg\TextCard;
use cdcchen\wework\msg\TextCardMessage;
use PHPUnit\Framework\TestCase;

/**
 * Class TextCardMessageTest
 * @package msg
 */
class TextCardMessageTest extends TestCase
{
    /**
     * @return TextCardMessage
     */
    public function testInstance()
    {
        $msg = new TextCardMessage();
        $this->assertInstanceOf(TextCardMessage::class, $msg);

        return $msg;
    }

    /**
     * @param TextCardMessage $msg
     * @depends testInstance
     */
    public function testMsgType(TextCardMessage $msg)
    {
        $this->assertEquals(Message::TYPE_TEXT_CARD, $msg->getMsgType());
    }

    /**
     * @param TextCardMessage $msg
     * @depends testInstance
     */
    public function testSetCard(TextCardMessage $msg)
    {
        $card = (new TextCard())->setDetail(
            'this is title',
            'this is desc',
            'http://github.com',
            'gogog'
        );
        $msg->setCard($card);

        $this->assertEquals($card, $msg->getCard());
    }
}