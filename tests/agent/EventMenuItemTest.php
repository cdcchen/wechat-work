<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/25
 * Time: 11:00
 */

namespace agent;


use cdcchen\wework\agent\EventMenuItem;
use PHPUnit\Framework\TestCase;

class EventMenuItemTest extends TestCase
{
    public function testInstance()
    {
        $this->assertInstanceOf(EventMenuItem::class, new EventMenuItem());
    }

    public function testInstanceWithAttributes()
    {
        $attributes = [
            'type' => EventMenuItem::TYPE_VIEW,
            'name' => '菜单111',
            'key' => 'get_info',
        ];
        $item = new EventMenuItem($attributes);
        $actual = [
            'type' => $item->getType(),
            'name' => $item->getName(),
            'key' => $item->getKey(),
        ];
        $this->assertEquals($attributes, $actual);

        return $item;
    }

    public function testSetKey()
    {
        $item = new EventMenuItem();
        $item->setKey('get_news');
        $this->assertEquals('get_news', $item->getKey());
    }
}