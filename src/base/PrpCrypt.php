<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 15/7/22
 * Time: 下午5:11
 */

namespace cdcchen\wework\base;

/**
 * 提供接收和推送给公众平台消息的加解密接口.
 *
 * Class PrpCrypt
 * @package cdcchen\wework\base
 */
class PrpCrypt
{
    /**
     * random string len
     */
    const RANDOM_STRING_LEN = 16;
    /**
     * Cipher method
     */
    const CIPHER_METHOD = 'AES-128-CBC';

    /**
     * @var string
     */
    private $_key;

    /**
     * PrpCrypt constructor.
     * @param string $k
     */
    public function __construct($k)
    {
        $this->_key = base64_decode($k . '=');
    }

    /**
     * 对明文进行加密
     *
     * @param string $text 需要加密的明文
     * @param string $corpId
     * @return string 加密后的密文
     */
    public function encrypt($text, $corpId): string
    {

        //获得16位随机字符串，填充到明文之前
        $random = $this->getRandomStr();
        $text = $random . pack('N', strlen($text)) . $text . $corpId;

        //使用自定义的填充方式对明文进行补位填充
        $text = PKCS7Encoder::encode($text);

        $iv = $this->getInitVector();
        $encrypted = openssl_encrypt($text, self::CIPHER_METHOD, $this->_key, 0, $iv);

        // 使用BASE64对加密后的字符串进行编码
        return base64_encode($encrypted);
    }

    /**
     * 对密文进行解密
     *
     * @param string $encrypted 需要解密的密文
     * @param string $corpId
     * @return string 解密得到的明文
     */
    public function decrypt($encrypted, $corpId): string
    {
        //使用BASE64对需要解密的字符串进行解码
        $cipherText = base64_decode($encrypted);
        $iv = $this->getInitVector();
        $decrypted = openssl_decrypt($cipherText, self::CIPHER_METHOD, $this->_key, 0, $iv);

        //去除补位字符
        $result = PKCS7Encoder::decode($decrypted);

        //去除16位随机字符串,网络字节序和AppId
        if (strlen($result) < self::RANDOM_STRING_LEN) {
            return '';
        }

        $content = substr($result, self::RANDOM_STRING_LEN);
        list(, $xmlContentLen) = unpack('N', substr($content, 0, 4));

        return substr($content, 4, $xmlContentLen);
    }


    /**
     * 随机生成16位字符串
     *
     * @return string 生成的字符串
     */
    public function getRandomStr(): string
    {
        $str = '';
        $strPool = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
        $max = strlen($strPool) - 1;
        for ($i = 0; $i < self::RANDOM_STRING_LEN; $i++) {
            $str .= $strPool[mt_rand(0, $max)];
        }

        return $str;
    }

    /**
     * @return string
     */
    private function getInitVector(): string
    {
        return substr($this->_key, 0, 16);
    }
}