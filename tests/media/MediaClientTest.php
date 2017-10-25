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
        /** @var AccessToken $token */
        $token = (new AccessTokenRequest())->setCredential(CORP_ID, AGENT_SECRET)->send();
        static::$accessToken = $token->getToken();
    }

    public function setUp()
    {
        $this->client = (new MediaClient())->setAccessToken(static::$accessToken);
    }

    public function testUploadFile()
    {
        $result = $this->client->uploadFile(__DIR__ . '/file.txt');
        $this->assertArrayHasKey('media_id', $result);
        sleep(1);

        return $result['media_id'];
    }

    public function testUploadImage()
    {
        $result = $this->client->uploadImage(__DIR__ . '/image.png');
        $this->assertArrayHasKey('media_id', $result);
        sleep(1);
    }

    public function testUploadVoice()
    {
        $result = $this->client->uploadVoice(__DIR__ . '/voice.mp3');
        $this->assertArrayHasKey('media_id', $result);
        sleep(1);
    }

    public function testUploadVideo()
    {
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
        $data = $this->client->get($mediaId);
        $this->assertTrue(strlen($data) > 0);
    }
}