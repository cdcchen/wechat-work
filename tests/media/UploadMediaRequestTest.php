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
use cdcchen\wework\media\MediaType;
use cdcchen\wework\media\UploadMediaRequest;
use PHPUnit\Framework\TestCase;

class UploadMediaRequestTest extends TestCase
{
    static $accessToken;

    /**
     * @var UploadMediaRequest
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
        $this->request = (new UploadMediaRequest())->setAccessToken(static::$accessToken);
    }

    public function testUploadMediaFile()
    {
        if (SKIP_REAL_REQUEST) {
            $this->markTestSkipped('Skip real api http request test.');
        }

        $filename = __DIR__ . '/file.txt';
        $this->request->setType(MediaType::FILE)
                      ->setMedia($filename);
        $data = $this->request->send();

        $this->assertArrayHasKey('media_id', $data);
    }

    public function testUploadMediaImage()
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
}