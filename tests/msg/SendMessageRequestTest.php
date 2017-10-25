<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 15:26
 */

namespace msg;


use cdcchen\wework\AccessTokenRequest;
use cdcchen\wework\base\AccessToken;
use cdcchen\wework\msg\FileMessage;
use cdcchen\wework\msg\ImageMessage;
use cdcchen\wework\msg\MPNewsArticle;
use cdcchen\wework\msg\MPNewsMessage;
use cdcchen\wework\msg\NewsArticle;
use cdcchen\wework\msg\NewsMessage;
use cdcchen\wework\msg\SendMessageRequest;
use cdcchen\wework\msg\TextCard;
use cdcchen\wework\msg\TextCardMessage;
use cdcchen\wework\msg\TextMessage;
use cdcchen\wework\msg\VideoMessage;
use cdcchen\wework\msg\VoiceMessage;
use PHPUnit\Framework\TestCase;

class SendMessageRequestTest extends TestCase
{
    static $accessToken;

    /**
     * @var SendMessageRequest
     */
    protected $request;

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
        $this->request = (new SendMessageRequest())->setAccessToken(static::$accessToken);
    }

    public function testSendTextMessage()
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $message = (new TextMessage())->setToUser([USER_ID])
                                      ->setAgentId(AGENT_ID)
                                      ->setContent('测试消息');
        $data = $this->request->setMessage($message)->send();
        $this->assertTrue(is_array($data));
    }

    public function testSendImageMessage()
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $message = (new ImageMessage())->setToUser([USER_ID])
                                       ->setAgentId(AGENT_ID)
                                       ->setMediaId('27r7HtwGGexjynp4x5uG2wpgVCx2cAfz3NXNBPIcnhGs');
        $data = $this->request->setMessage($message)->send();
        $this->assertTrue(is_array($data));
    }

    public function testSendVoiceMessage()
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $message = (new VoiceMessage())->setToUser([USER_ID])
                                       ->setAgentId(AGENT_ID)
                                       ->setMediaId('2gFNOQkEGGLyx76Cnq2Y98BVGJ3pQ9esZXPUTWKSYIdI');
        $data = $this->request->setMessage($message)->send();
        $this->assertTrue(is_array($data));
    }

    public function testSendVideoMessage()
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $message = (new VideoMessage())->setToUser([USER_ID])
                                       ->setAgentId(AGENT_ID)
                                       ->setVideo(
                                           '3C123CKuqf0hS5FyXnlitL2f4CQ4YA9IjHwz4SZ1WdokPWlXsg_63ORDNddwzwrJ6',
                                           '测试视频',
                                           '这是一个小视频');

        $data = $this->request->setMessage($message)->send();
        $this->assertTrue(is_array($data));
    }

    public function testSendFileMessage()
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $message = (new FileMessage())->setToUser([USER_ID])
                                      ->setAgentId(AGENT_ID)
                                      ->setMediaId('26JzmBovgqgEIHEuy3DH49K9zvVy_5NdTOK3OXnRaUvA0z8VuMyhflp5eO7gM_sEc');

        $data = $this->request->setMessage($message)->send();
        $this->assertTrue(is_array($data));
    }

    public function testSendTextCardMessage()
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $card = new TextCard();
        $card->setTitle('测试卡片');
        $card->setDescription('卡片描述');
        $card->setUrl('http://www.qq.com');
        $card->setBtnText('按钮文本');
        $message = (new TextCardMessage())->setToUser([USER_ID])
                                          ->setAgentId(AGENT_ID)
                                          ->setCard($card);

        $data = $this->request->setMessage($message)->send();
        $this->assertTrue(is_array($data));
    }

    public function testSendNewsMessage()
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $news1 = new NewsArticle();
        $news1->setTitle('测试标题11')
              ->setDescription('测试描述11')
              ->setPicUrl('https://www.baidu.com/img/bd_logo1.png')
              ->setUrl('https:/www.baidu.com/')
              ->setBtnText('测试按钮文本11');

        $news2 = new NewsArticle();
        $news2->setTitle('测试标题22')
              ->setDescription('测试描述22')
              ->setPicUrl('https://www.baidu.com/img/bd_logo1.png')
              ->setUrl('https:/www.baidu.com/')
              ->setBtnText('测试按钮文本22');
        $message = (new NewsMessage())->setToUser([USER_ID])
                                      ->setAgentId(AGENT_ID)
                                      ->setArticles([$news1, $news2]);

        $data = $this->request->setMessage($message)->send();
        $this->assertTrue(is_array($data));
    }

    public function testSendMPNewsMessage()
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $news1 = new MPNewsArticle();
        $news1->setTitle('测试标题11')
              ->setContent('测试内容11')
              ->setContentSourceUrl('http:/www.baidu.com/')
              ->setAuthor('测试作者11')
              ->setThumbMediaId('2i67o_McXpCq8cIhMTNX4iKi4rp3gjHC1KdTD3wBvJF9pcrKLpX-_v6_-Wa9lzF0K')
              ->setDigest('测试描述11');

        $news2 = new MPNewsArticle();
        $news2->setTitle('测试标题22')
              ->setContent('测试内容22')
              ->setContentSourceUrl('http:/www.baidu.com/')
              ->setAuthor('测试作者22')
              ->setThumbMediaId('2i67o_McXpCq8cIhMTNX4iKi4rp3gjHC1KdTD3wBvJF9pcrKLpX-_v6_-Wa9lzF0K')
              ->setDigest('测试描述22');

        $message = (new MPNewsMessage())->setToUser([USER_ID])
                                        ->setAgentId(AGENT_ID)
                                        ->setArticles([$news1, $news2]);

        $data = $this->request->setMessage($message)->send();
        $this->assertTrue(is_array($data));
    }
}