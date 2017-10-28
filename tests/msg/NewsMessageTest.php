<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/28
 * Time: 12:24
 */

namespace msg;


use cdcchen\wework\msg\Message;
use cdcchen\wework\msg\NewsArticle;
use cdcchen\wework\msg\NewsMessage;
use PHPUnit\Framework\TestCase;

/**
 * Class NewsMessageTest
 * @package msg
 */
class NewsMessageTest extends TestCase
{
    /**
     * @return NewsMessage
     */
    public function testInstance()
    {
        $msg = new NewsMessage();
        $this->assertInstanceOf(NewsMessage::class, $msg);

        return $msg;
    }

    /**
     * @param NewsMessage $msg
     * @depends testInstance
     */
    public function testMsgType(NewsMessage $msg)
    {
        $this->assertEquals(Message::TYPE_NEWS, $msg->getMsgType());
    }

    /**
     * @param NewsMessage $msg
     * @depends testInstance
     */
    public function testSetContent(NewsMessage $msg)
    {
        $article1 = (new NewsArticle())->setDetail(
            'this is title',
            'this is desc',
            'http://github.com',
            'https://www.baidu.com/img/bd_logo1.png',
            'gogog'
        );
        $article2 = (new NewsArticle())->setDetail(
            'this is title22222',
            'this is desc22222',
            'http://github.com/#22222',
            'https://www.baidu.com/img/bd_logo1.png#22222',
            'gogog'
        );
        $articles = [$article1, $article2];
        $msg->setArticles($articles);

        $this->assertEquals($articles, $msg->getArticles());
    }
}