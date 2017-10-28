<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/28
 * Time: 12:24
 */

namespace msg;


use cdcchen\wework\msg\Message;
use cdcchen\wework\msg\VideoMessage;
use PHPUnit\Framework\TestCase;

/**
 * Class VideoMessageTest
 * @package msg
 */
class VideoMessageTest extends TestCase
{
    /**
     * @return VideoMessage
     */
    public function testInstance()
    {
        $msg = new VideoMessage();
        $this->assertInstanceOf(VideoMessage::class, $msg);

        return $msg;
    }

    /**
     * @param VideoMessage $msg
     * @depends testInstance
     */
    public function testMsgType(VideoMessage $msg)
    {
        $this->assertEquals(Message::TYPE_VIDEO, $msg->getMsgType());
    }

    /**
     * @param VideoMessage $msg
     * @depends testInstance
     */
    public function testSetVideo(VideoMessage $msg)
    {
        $mediaId = 'askdfasd9wnwmkevnoiwefjnwelvwfkwefw0sadfj';
        $title = 'this is a test title';
        $desc = 'this is a test description';
        $msg->setVideo($mediaId, $title, $desc);

        $video = [
            'media_id' => $mediaId,
            'title' => $title,
            'description' => $desc
        ];
        $this->assertEquals($video, $msg->getVideo());
    }
}