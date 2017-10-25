<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/25
 * Time: 13:46
 */

namespace base;


use cdcchen\wework\base\AttributeArray;
use PHPUnit\Framework\TestCase;

class AttributeArrayTest extends TestCase
{
    public function testInstance()
    {
        $obj = new AttributeArray();
        $this->assertInstanceOf(AttributeArray::class, $obj);
    }

    public function testToArray()
    {
        $attributes = [
            'key1' => __LINE__,
            'key2' => __LINE__,
            'key3' => __LINE__,
        ];
        $obj = new AttributeArray($attributes);
        $this->assertEquals($attributes, $obj->toArray());
    }

    public function testGetNotExistKeyReturnNull()
    {
        $obj = new AttributeArray();
        $this->assertNull($obj->get('key'));
    }

    public function testGetExistKeyReturnNull()
    {
        $obj = new AttributeArray(['key' => __METHOD__]);
        $this->assertEquals(__METHOD__, $obj->get('key'));
    }

    public function testOffsetGet()
    {
        $obj = new AttributeArray(['key' => __METHOD__]);
        $this->assertEquals(__METHOD__, $obj['key']);
    }

    public function testSet()
    {
        $obj = new AttributeArray();
        $obj->set('key', __NAMESPACE__);
        $this->assertEquals(__NAMESPACE__, $obj->get('key'));

        return $obj;
    }

    public function testOffsetSet()
    {
        $obj = new AttributeArray();
        $obj['key'] = __NAMESPACE__;
        $this->assertEquals(__NAMESPACE__, $obj->get('key'));
    }

    /**
     * @param AttributeArray $obj
     * @depends testSet
     */
    public function testAppend(AttributeArray $obj)
    {
        $obj->append('key', __CLASS__);
        $this->assertEquals([__NAMESPACE__, __CLASS__], $obj->get('key'));
    }

    public function testHasReturnTrue()
    {
        $obj = new AttributeArray(['key' => __LINE__]);
        $this->assertTrue($obj->has('key'));
    }

    public function testHasReturnFalse()
    {
        $obj = new AttributeArray(['key' => __LINE__]);
        $this->assertFalse($obj->has('not_exist_key'));
    }

    public function testOffsetIsset()
    {
        $obj = new AttributeArray(['key' => __LINE__]);
        $this->assertTrue(isset($obj['key']));
    }

    public function testRemove()
    {
        $obj = new AttributeArray(['key' => __LINE__]);
        $obj->remove('key');
        $this->assertFalse($obj->has('key'));
    }

    public function testOffsetUnset()
    {
        $obj = new AttributeArray(['key' => __LINE__]);
        unset($obj['key']);
        $this->assertFalse($obj->has('key'));
    }

    public function testCount()
    {
        $attributes = [
            'key1' => __LINE__,
            'key2' => __LINE__,
            'key3' => __LINE__,
        ];
        $obj = new AttributeArray($attributes);
        $this->assertEquals(3, $obj->count());
    }

    public function testIsEmptyReturnTrue()
    {
        $obj = new AttributeArray();
        $this->assertTrue($obj->isEmpty());
    }

    public function testIsEmptyReturnFase()
    {
        $obj = new AttributeArray(['key' => __METHOD__]);
        $this->assertFalse($obj->isEmpty());
    }

    public function testSerialize()
    {
        $attributes = [
            'key1' => __NAMESPACE__,
            'key2' => __CLASS__,
        ];
        $obj = new AttributeArray($attributes);
        $serialized = serialize($obj);
        $this->assertContains(serialize($attributes), $serialized);

        return $serialized;
    }

    /**
     * @param string $serialized
     * @depends testSerialize
     */
    public function testUnSerialize(string $serialized)
    {
        /**
         * @var AttributeArray $obj
         */
        $obj = unserialize($serialized);
        $attributes = [
            'key1' => __NAMESPACE__,
            'key2' => __CLASS__,
        ];
        $this->assertEquals($attributes, $obj->toArray());
    }

    public function testJsonSerialize()
    {
        $attributes = [
            'key1' => __LINE__,
            'key2' => __LINE__,
            'key3' => __LINE__,
        ];
        $obj = new AttributeArray($attributes);
        $this->assertEquals(json_encode($attributes), json_encode($obj));
    }
}