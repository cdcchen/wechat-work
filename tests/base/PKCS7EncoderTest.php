<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/25
 * Time: 15:08
 */

namespace base;


use cdcchen\wework\base\PKCS7Encoder;
use PHPUnit\Framework\TestCase;

class PKCS7EncoderTest extends TestCase
{
    public function testEncode()
    {
        $encoding = 'this is a test text'; // len=19 padLen=13 padChar=\r
        $expected = $encoding . str_repeat("\r", 13);
        $encoded = PKCS7Encoder::encode($encoding);

        $this->assertEquals($expected, $encoded);

        return $encoded;
    }

    public function te2stDecode(string $encoded)
    {
        $encoding = 'this is a test text';
        $this->assertEquals($encoding, PKCS7Encoder::decode($encoded));
    }
}