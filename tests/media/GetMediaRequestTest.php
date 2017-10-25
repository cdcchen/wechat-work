<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/19
 * Time: 13:51
 */

namespace media;


use cdcchen\wework\AccessTokenRequest;
use cdcchen\wework\base\AccessToken;
use cdcchen\wework\media\GetMediaRequest;
use cdcchen\wework\media\MediaType;
use cdcchen\wework\media\UploadMediaRequest;
use PHPUnit\Framework\TestCase;

class GetMediaRequestTest extends TestCase
{
    static $accessToken;

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

    public function testUploadMedia()
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $request = (new UploadMediaRequest())->setAccessToken(static::$accessToken);

        $filename = __DIR__ . '/image.png';
        $request->setType(MediaType::IMAGE)
                ->setMedia($filename);

        $data = $request->send();
        $this->assertArrayHasKey('media_id', $data);

        return $data['media_id'];
    }

    /**
     * @param string $mediaId
     * @depends testUploadMedia
     */
    public function testGetMedia(string $mediaId)
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $request = (new GetMediaRequest())->setAccessToken(static::$accessToken)->setMediaId($mediaId);
        $content = $request->send();
        $this->assertTrue(strlen($content) > 0);
    }
}