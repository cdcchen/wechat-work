<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/28
 * Time: 13:49
 */

namespace msg;


use cdcchen\wework\msg\NewsArticle;
use PHPUnit\Framework\TestCase;

class NewsArticleTest extends TestCase
{
    private static $attributes = [
        'title' => 'this is title',
        'description' => 'this is desc',
        'url' => 'http://github.com',
        'picurl' => 'https://www.baidu.com/img/bd_logo1.png',
        'btntxt' => 'gogogo',
    ];

    public function testInstance()
    {
        $this->assertInstanceOf(NewsArticle::class, new NewsArticle());
    }

    public function testInstanceWithAttributes()
    {
        $this->assertInstanceOf(NewsArticle::class, new NewsArticle(static::$attributes));
    }

    public function testToArrayByInstancedWithAttributes()
    {
        $article = new NewsArticle(static::$attributes);
        $this->assertInstanceOf(NewsArticle::class, $article);

        $this->assertEquals(static::$attributes, $article->toArray());
    }

    public function testSetDetail()
    {
        $article = new NewsArticle();
        $article->setDetail(
            static::$attributes['title'],
            static::$attributes['description'],
            static::$attributes['url'],
            static::$attributes['picurl'],
            static::$attributes['btntxt']);

        $this->assertEquals(static::$attributes, $article->toArray());
    }

    public function testSetTitle()
    {
        $article = new NewsArticle();
        $article->setTitle(static::$attributes['title']);

        $this->assertEquals(static::$attributes['title'], $article->getTitle());
    }

    public function testSetDescription()
    {
        $article = new NewsArticle();
        $article->setDescription(static::$attributes['description']);

        $this->assertEquals(static::$attributes['description'], $article->getDescription());
    }

    public function testSetUrl()
    {
        $article = new NewsArticle();
        $article->setUrl(static::$attributes['url']);

        $this->assertEquals(static::$attributes['url'], $article->getUrl());
    }

    public function testSetPicUrl()
    {
        $article = new NewsArticle();
        $article->setPicUrl(static::$attributes['picurl']);

        $this->assertEquals(static::$attributes['picurl'], $article->getPicUrl());
    }

    public function testSetBtnText()
    {
        $article = new NewsArticle();
        $article->setBtnText(static::$attributes['btntxt']);

        $this->assertEquals(static::$attributes['btntxt'], $article->getBtnText());
    }

    public function testSetTitleDescriptionUrlBtnText()
    {
        $article = new NewsArticle();
        $article->setTitle(static::$attributes['title'])
             ->setDescription(static::$attributes['description'])
             ->setUrl(static::$attributes['url'])
             ->setPicUrl(static::$attributes['picurl'])
             ->setBtnText(static::$attributes['btntxt']);

        $this->assertEquals(static::$attributes, $article->toArray());
    }
}