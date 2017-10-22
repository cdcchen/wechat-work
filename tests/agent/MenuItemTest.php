<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/22
 * Time: 15:02
 */

namespace agent;


use cdcchen\wework\agent\MenuItem;
use PHPUnit\Framework\TestCase;

class MenuItemTest extends TestCase
{
    public function testInstance()
    {
        $item = new MenuItem();
        $this->assertInstanceOf(MenuItem::class, $item);

        return $item;
    }

    /**
     * @param MenuItem $item
     * @depends testInstance
     */
    public function testSetType(MenuItem $item)
    {
        $item->setType(MenuItem::TYPE_VIEW);
        $this->assertEquals(MenuItem::TYPE_VIEW, $item->getType());
    }

    /**
     * @param MenuItem $item
     * @depends testInstance
     */
    public function testSetName(MenuItem $item)
    {
        $item->setName('菜单111');
        $this->assertEquals('菜单111', $item->getName());
    }

    /**
     * @param MenuItem $item
     * @depends testInstance
     */
    public function testSetSubButton(MenuItem $item)
    {
        $subItem = new MenuItem([
            'type' => MenuItem::TYPE_VIEW,
            'name' => '子菜单222',
            'url' => 'http://www.github.com',
        ]);
        $item->setSubButton([$subItem]);
        $this->assertEquals([$subItem], $item->getSubButton());
    }

    /**
     * @param MenuItem $item
     * @depends testInstance
     */
    public function testAddSubButton(MenuItem $item)
    {
        $subItem1 = new MenuItem([
            'type' => MenuItem::TYPE_VIEW,
            'name' => '子菜单111',
            'url' => 'http://www.github.com',
        ]);
        $subItem2 = new MenuItem([
            'type' => MenuItem::TYPE_VIEW,
            'name' => '子菜单222',
            'url' => 'http://www.github.com',
        ]);
        $item->setSubButton([$subItem1]);
        $item->addSubButton($subItem2);
        $this->assertEquals([$subItem1, $subItem2], $item->getSubButton());
    }

    public function testNewViewItem()
    {
        $subItem = new MenuItem([
            'type' => MenuItem::TYPE_VIEW,
            'name' => '子菜单111',
            'url' => 'http://github.com',
        ]);
        $item = MenuItem::newViewMenuItem('菜单111', 'http://www.github.com', [$subItem]);

        $expected = [
            'type' => MenuItem::TYPE_VIEW,
            'name' => '菜单111',
            'url' => 'http://www.github.com',
            'sub_button' => [
                [
                    'type' => MenuItem::TYPE_VIEW,
                    'name' => '子菜单111',
                    'url' => 'http://github.com',
                ]
            ]
        ];

        $this->assertEquals(json_encode($expected, 320), $item->jsonEncode());
    }

    public function testNewClickItem()
    {
        $subItem = new MenuItem([
            'type' => MenuItem::TYPE_CLICK,
            'name' => '子菜单111',
            'key' => 'click_key'
        ]);
        $item = MenuItem::newEventMenuItem(MenuItem::TYPE_CLICK, '菜单111', 'click_key', [$subItem]);

        $expected = [
            'type' => MenuItem::TYPE_CLICK,
            'name' => '菜单111',
            'key' => 'click_key',
            'sub_button' => [
                [
                    'type' => MenuItem::TYPE_CLICK,
                    'name' => '子菜单111',
                    'key' => 'click_key'
                ]
            ]
        ];

        $this->assertEquals(json_encode($expected, 320), $item->jsonEncode());
    }
}