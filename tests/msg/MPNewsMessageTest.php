<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/28
 * Time: 12:24
 */

namespace msg;


use cdcchen\wework\msg\Message;
use cdcchen\wework\msg\MPNewsArticle;
use cdcchen\wework\msg\MPNewsMessage;
use PHPUnit\Framework\TestCase;

/**
 * Class MPNewsMessageTest
 * @package msg
 */
class MPNewsMessageTest extends TestCase
{
    /**
     * @return MPNewsMessage
     */
    public function testInstance()
    {
        $msg = new MPNewsMessage();
        $this->assertInstanceOf(MPNewsMessage::class, $msg);

        return $msg;
    }

    /**
     * @param MPNewsMessage $msg
     * @depends testInstance
     */
    public function testMsgType(MPNewsMessage $msg)
    {
        $this->assertEquals(Message::TYPE_MPNEWS, $msg->getMsgType());
    }

    /**
     * @param MPNewsMessage $msg
     * @depends testInstance
     */
    public function testSetContent(MPNewsMessage $msg)
    {
        $article1 = (new MPNewsArticle())->setDetail(
            'this is title',
            'this is thumb media id',
            'this is content',
            'this is digest',
            'https://www.baidu.com/img/bd_logo1.png',
            'chen'
        );
        $article2 = (new MPNewsArticle())->setDetail(
            'this is title222222',
            'this is thumb media id222222',
            'this is content22222',
            'this is digest22222',
            'https://www.baidu.com/img/bd_logo1.png',
            'chen2222'
        );

        $articles = [$article1, $article2];
        $msg->setArticles($articles);

        $this->assertEquals($articles, $msg->getArticles());
    }
}