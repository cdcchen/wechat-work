<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/28
 * Time: 13:49
 */

namespace msg;


use cdcchen\wework\msg\TextCard;
use PHPUnit\Framework\TestCase;

class TextCardTest extends TestCase
{
    private static $attributes = [
        'title' => 'this is title',
        'description' => 'this is desc',
        'url' => 'http://github.com',
        'btntxt' => 'gogogo',
    ];

    public function testInstance()
    {
        $this->assertInstanceOf(TextCard::class, new TextCard());
    }

    public function testInstanceWithAttributes()
    {
        $this->assertInstanceOf(TextCard::class, new TextCard(static::$attributes));
    }

    public function testToArrayByInstancedWithAttributes()
    {
        $card = new TextCard(static::$attributes);
        $this->assertInstanceOf(TextCard::class, $card);

        $this->assertEquals(static::$attributes, $card->toArray());
    }

    public function testSetDetail()
    {
        $card = new TextCard();
        $card->setDetail(
            static::$attributes['title'],
            static::$attributes['description'],
            static::$attributes['url'],
            static::$attributes['btntxt']);

        $this->assertEquals(static::$attributes, $card->toArray());
    }

    public function testSetTitle()
    {
        $card = new TextCard();
        $card->setTitle(static::$attributes['title']);

        $this->assertEquals(static::$attributes['title'], $card->getTitle());
    }

    public function testSetDescription()
    {
        $card = new TextCard();
        $card->setDescription(static::$attributes['description']);

        $this->assertEquals(static::$attributes['description'], $card->getDescription());
    }

    public function testSetUrl()
    {
        $card = new TextCard();
        $card->setUrl(static::$attributes['url']);

        $this->assertEquals(static::$attributes['url'], $card->getUrl());
    }

    public function testSetBtnText()
    {
        $card = new TextCard();
        $card->setBtnText(static::$attributes['btntxt']);

        $this->assertEquals(static::$attributes['btntxt'], $card->getBtnText());
    }

    public function testSetTitleDescriptionUrlBtnText()
    {
        $card = new TextCard();
        $card->setTitle(static::$attributes['title'])
             ->setDescription(static::$attributes['description'])
             ->setUrl(static::$attributes['url'])
             ->setBtnText(static::$attributes['btntxt']);

        $this->assertEquals(static::$attributes, $card->toArray());
    }
}