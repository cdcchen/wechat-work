<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/25
 * Time: 11:00
 */

namespace agent;


use cdcchen\wework\agent\MenuItem;
use cdcchen\wework\agent\ViewMenuItem;
use PHPUnit\Framework\TestCase;

class ViewMenuItemTest extends TestCase
{
    public function testInstance()
    {
        $item = new ViewMenuItem();
        $this->assertInstanceOf(ViewMenuItem::class, $item);

        return $item;
    }

    /**
     * @param ViewMenuItem $item
     * @depends testInstance
     */
    public function testTypeIsView(ViewMenuItem $item)
    {
        $this->assertEquals(MenuItem::TYPE_VIEW, $item->getType());
    }

    public function testSetKey()
    {
        $url = 'http://github.com';
        $item = new ViewMenuItem();
        $item->setUrl($url);
        $this->assertEquals($url, $item->getUrl());
    }

    public function testInstanceWithAttributes()
    {
        $attributes = [
            'type' => ViewMenuItem::TYPE_VIEW,
            'name' => '菜单111',
            'url' => 'http://github.com',
        ];
        $item = new ViewMenuItem($attributes);
        $actual = [
            'type' => $item->getType(),
            'name' => $item->getName(),
            'url' => $item->getUrl(),
        ];
        $this->assertEquals($attributes, $actual);

        return $item;
    }
}