<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/25
 * Time: 15:31
 */

namespace base;


use cdcchen\wework\base\PrpCrypt;
use PHPUnit\Framework\TestCase;

class PrpCryptTest extends TestCase
{
    public function testInstance()
    {
        $crypt = new PrpCrypt(CB_ENCODING_AES_KEY);
        $this->assertInstanceOf(PrpCrypt::class, $crypt);

        return $crypt;
    }

    /**
     * @param PrpCrypt $crypt
     * @depends testInstance
     */
    public function testGetRandomStr(PrpCrypt $crypt)
    {
        $this->assertEquals(PrpCrypt::RANDOM_STRING_LEN, strlen($crypt->getRandomStr()));
    }

    /**
     * @param PrpCrypt $crypt
     * @depends testInstance
     */
    public function testEncryptAndDecrypt(PrpCrypt $crypt)
    {
        $text = 'This is a test text';
        $encrypted = $crypt->encrypt($text, CORP_ID);
        $decrypted = $crypt->decrypt($encrypted);

        $this->assertEquals($text, $decrypted);
    }
}