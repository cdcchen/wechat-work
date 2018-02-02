<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 17/10/12
 * Time: 下午4:08
 */

namespace cdcchen\wework\base;


/**
 * 提供基于PKCS7算法的加解密接口.
 *
 * Class PKCS7Encoder
 * @package cdcchen\wework\base
 */
class PKCS7Encoder
{
    const BLOCK_SIZE = 32;

    /**
     * 对需要加密的明文进行填充补位
     *
     * @param string $text 需要进行填充补位操作的明文
     * @return string 补齐明文字符串
     */
    public static function encode($text): string
    {
        $padCount = self::BLOCK_SIZE - (strlen($text) % self::BLOCK_SIZE);
        $padChar = chr($padCount === 0 ? $padCount : self::BLOCK_SIZE);

        return $text . str_repeat($padChar, $padCount);
    }

    /**
     * 对解密后的明文进行补位删除
     *
     * @param string $text 解密后的明文
     * @return string 删除填充补位后的明文
     */
    public static function decode($text): string
    {
        $pad = ord(substr($text, -1));

        if ($pad < 1 || $pad > self::BLOCK_SIZE) {
            return $text;
        } else {
            return substr($text, 0, -$pad);
        }
    }
}
