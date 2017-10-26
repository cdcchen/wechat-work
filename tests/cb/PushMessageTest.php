<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/25
 * Time: 18:39
 */

namespace cb;


use cdcchen\http\XmlParser;
use cdcchen\wework\cb\PushMessage;
use PHPUnit\Framework\TestCase;

class PushMessageTest extends TestCase
{
    /**
     * @param string $attr
     * @return array
     * @dataProvider attributes
     */
    public function testXmlParserTest(string $attr)
    {
        $attributes = static::xmlData();
        $this->assertArrayHasKey($attr, $attributes);

        return $attributes;
    }

    public function attributes()
    {
        return [
            ['ToUserName'],
            ['FromUserName'],
            ['CreateTime'],
            ['MsgType'],
            ['Event'],
            ['MsgType'],
            ['AgentID'],
            ['EventKey'],
        ];
    }

    public function testInstance()
    {
        $attributes = static::xmlData();
        $msg = new PushMessage($attributes);
        $this->assertInstanceOf(PushMessage::class, $msg);

        return $msg;
    }

    /**
     * @param PushMessage $msg
     * @depends testInstance
     */
    public function testTypeIsNotText(PushMessage $msg)
    {
        $this->assertFalse($msg->isText());
    }

    /**
     * @param PushMessage $msg
     * @depends testInstance
     */
    public function testTypeIsNotImage(PushMessage $msg)
    {
        $this->assertFalse($msg->isImage());
    }

    /**
     * @param PushMessage $msg
     * @depends testInstance
     */
    public function testTypeIsNotVoice(PushMessage $msg)
    {
        $this->assertFalse($msg->isVoice());
    }

    /**
     * @param PushMessage $msg
     * @depends testInstance
     */
    public function testTypeIsNotVideo(PushMessage $msg)
    {
        $this->assertFalse($msg->isVideo());
    }

    /**
     * @param PushMessage $msg
     * @depends testInstance
     */
    public function testTypeIsNotLink(PushMessage $msg)
    {
        $this->assertFalse($msg->isLink());
    }

    /**
     * @param PushMessage $msg
     * @depends testInstance
     */
    public function testTypeIsNotLocation(PushMessage $msg)
    {
        $this->assertFalse($msg->isLocation());
    }

    /**
     * @param PushMessage $msg
     * @depends testInstance
     */
    public function testTypeIsEvent(PushMessage $msg)
    {
        $this->assertTrue($msg->isEvent());
    }

    /**
     * @param PushMessage $msg
     * @depends testInstance
     */
    public function testGetToUserName(PushMessage $msg)
    {
        $this->assertEquals('toUser', $msg->getToUserName());
    }

    /**
     * @param PushMessage $msg
     * @depends testInstance
     */
    public function testGetFromUserName(PushMessage $msg)
    {
        $this->assertEquals('fromUser', $msg->getFromUserName());
    }

    /**
     * @param PushMessage $msg
     * @depends testInstance
     */
    public function testGetAgentId(PushMessage $msg)
    {
        $this->assertEquals(1, $msg->getAgentId());
    }

    /**
     * @param PushMessage $msg
     * @depends testInstance
     */
    public function testGetMsgType(PushMessage $msg)
    {
        $this->assertEquals(PushMessage::TYPE_EVENT, $msg->getMsgType());
    }

    /**
     * @param PushMessage $msg
     * @depends testInstance
     */
    public function testGetEventKey(PushMessage $msg)
    {
        $this->assertEquals('view_result', $msg->getEventKey());
    }

    private static function xmlData()
    {
        $xml = '<xml>
                   <ToUserName><![CDATA[toUser]]></ToUserName>
                   <FromUserName><![CDATA[fromUser]]></FromUserName> 
                   <CreateTime>1348831860</CreateTime>
                   <MsgType><![CDATA[event]]></MsgType>
                   <Event><![CDATA[click]]></Event>
                   <EventKey><![CDATA[view_result]]></EventKey>
                   <AgentID>1</AgentID>
                </xml>';

        return XmlParser::xmlToArray($xml);
    }
}