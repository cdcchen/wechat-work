<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/25
 * Time: 16:14
 */

namespace media;


use cdcchen\wework\AccessTokenRequest;
use cdcchen\wework\base\AccessToken;
use cdcchen\wework\media\MediaClient;
use PHPUnit\Framework\TestCase;

class MediaClientTest extends TestCase
{
    static $accessToken;

    /**
     * @var MediaClient
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
        $this->client = (new MediaClient())->setAccessToken(static::$accessToken);
    }

    public function testUploadFile()
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $result = $this->client->uploadFile(__DIR__ . '/file.txt');
        $this->assertArrayHasKey('media_id', $result);
        sleep(1);

        return $result['media_id'];
    }

    public function testUploadImage()
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $result = $this->client->uploadImage(__DIR__ . '/image.png');
        $this->assertArrayHasKey('media_id', $result);
        sleep(1);
    }

    public function testUploadVoice()
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $result = $this->client->uploadVoice(__DIR__ . '/voice.amr');
        $this->assertArrayHasKey('media_id', $result);
        sleep(1);
    }

    public function testUploadVideo()
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $result = $this->client->uploadVideo(__DIR__ . '/video.mp4');
        $this->assertArrayHasKey('media_id', $result);
        sleep(1);
    }

    /**
     * @param string $mediaId
     * @depends testUploadFile
     */
    public function testGetMedia(string $mediaId)
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $data = $this->client->get($mediaId);
        $this->assertTrue(strlen($data) > 0);
    }
}