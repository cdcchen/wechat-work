<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 11:18
 */

namespace contact;


use cdcchen\wework\AccessTokenRequest;
use cdcchen\wework\base\AccessToken;
use cdcchen\wework\contact\GetUserRequest;
use PHPUnit\Framework\TestCase;

class GetUserRequestTest extends TestCase
{
    /**
     * @var GetUserRequest
     */
    protected $request;

    public function setUp()
    {
        $this->request = new GetUserRequest();
    }

    public function testSetUserId()
    {
        $this->request->setUserId('chendong');
        $this->assertEquals('chendong', $this->request->getUserId());
    }

    public function testSend()
    {
        /** @var AccessToken $accessToken */
        $accessToken = (new AccessTokenRequest())->setCredential(CORP_ID, CORP_SECRET)->send();
        $user = $this->request->setAccessToken($accessToken->getToken())->setUserId(USER_ID)->send();
        $this->assertTrue(is_array($user));

        return $user;
    }

    /**
     * @param array $user
     * @depends testSend
     */
    public function testUserData(array $user)
    {
        $keys = [
            'userid',
            'name',
            'mobile',
            'department',
            'order',
            'position',
            'gender',
            'email',
            'avatar',
            'status',
            'isleader',
            'extattr',
            'english_name',
            'telephone',
            'enable',
            'hide_mobile',
            'order'
        ];
        $this->assertEmpty(array_diff($keys, array_keys($user)));
    }
}