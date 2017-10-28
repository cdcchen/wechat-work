<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 18:02
 */

namespace msg;


use cdcchen\wework\AccessTokenRequest;
use cdcchen\wework\base\AccessToken;
use cdcchen\wework\msg\MessageClient;
use cdcchen\wework\msg\NewsArticle;
use cdcchen\wework\msg\TextCard;
use PHPUnit\Framework\TestCase;

class MessageClientTest extends TestCase
{
    static $accessToken;

    /**
     * @var MessageClient
     */
    protected $client;

    public static function setUpBeforeClass()
    {
        if (SKIP_REAL_REQUEST) {
            $token = new AccessToken(__METHOD__, 7200);
        } else {
            /** @var AccessToken $token */
            $token = (new AccessTokenRequest())->setCredential(CORP_ID, AGENT_SECRET)->send();
        }
        static::$accessToken = $token->getToken();
    }

    public function setUp()
    {
        $this->client = (new MessageClient())->setAccessToken(static::$accessToken);
    }

    public function testSendText()
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $data = $this->client->sendText(AGENT_ID, '测试文本内容', [USER_ID]);
        $this->assertTrue(is_array($data));
    }

    public function testSendImage()
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $data = $this->client->sendImage(AGENT_ID, IMAGE_MEDIA_ID, [USER_ID]);
        $this->assertTrue(is_array($data));
    }

    public function testSendFile()
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $data = $this->client->sendFile(AGENT_ID, FILE_MEDIA_ID, [USER_ID]);
        $this->assertTrue(is_array($data));
    }

    public function testSendVoice()
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $data = $this->client->sendVoice(AGENT_ID, VOICE_MEDIA_ID, [USER_ID]);
        $this->assertTrue(is_array($data));
    }

    public function testSendVideo()
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $data = $this->client->sendVideo(AGENT_ID, VIDEO_MEDIA_ID, 'title', 'description', [USER_ID]);
        $this->assertTrue(is_array($data));
    }

    public function testSendTextCard()
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $card = (new TextCard())->setDetail('测试卡片', '卡片描述', 'http://www.qq.com', '按钮文本');
        $data = $this->client->sendTextCard(AGENT_ID, $card, [USER_ID]);
        $this->assertTrue(is_array($data));
    }

    public function testSendNews()
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

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

        $data = $this->client->sendNews(AGENT_ID, $articles, [USER_ID]);
        $this->assertTrue(is_array($data));
    }
}