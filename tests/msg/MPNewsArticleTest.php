<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/28
 * Time: 13:49
 */

namespace msg;


use cdcchen\wework\msg\MPNewsArticle;
use PHPUnit\Framework\TestCase;

class MPNewsArticleTest extends TestCase
{
    private static $attributes = [
        'title' => 'this is title',
        'thumb_media_id' => 'http://github.com',
        'content' => 'this is content',
        'digest' => 'https://www.baidu.com/img/bd_logo.png',
        'content_source_url' => 'http://github.com',
        'author' => 'Dong Chen',
    ];

    public function testInstance()
    {
        $this->assertInstanceOf(MPNewsArticle::class, new MPNewsArticle());
    }

    public function testInstanceWithAttributes()
    {
        $this->assertInstanceOf(MPNewsArticle::class, new MPNewsArticle(static::$attributes));
    }

    public function testToArrayByInstancedWithAttributes()
    {
        $article = new MPNewsArticle(static::$attributes);
        $this->assertInstanceOf(MPNewsArticle::class, $article);

        $this->assertEquals(static::$attributes, $article->toArray());
    }

    public function testSetDetail()
    {
        $article = new MPNewsArticle();
        $article->setDetail(
            static::$attributes['title'],
            static::$attributes['thumb_media_id'],
            static::$attributes['content'],
            static::$attributes['digest'],
            static::$attributes['content_source_url'],
            static::$attributes['author']);

        $this->assertEquals(static::$attributes, $article->toArray());
    }

    public function testSetTitle()
    {
        $article = new MPNewsArticle();
        $article->setTitle(static::$attributes['title']);

        $this->assertEquals(static::$attributes['title'], $article->getTitle());
    }

    public function testSetThumbMediaId()
    {
        $article = new MPNewsArticle();
        $article->setThumbMediaId(static::$attributes['thumb_media_id']);

        $this->assertEquals(static::$attributes['thumb_media_id'], $article->getThumbMediaId());
    }

    public function testSetContent()
    {
        $article = new MPNewsArticle();
        $article->setContent(static::$attributes['content']);

        $this->assertEquals(static::$attributes['content'], $article->getContent());
    }

    public function testSetDigest()
    {
        $article = new MPNewsArticle();
        $article->setDigest(static::$attributes['digest']);

        $this->assertEquals(static::$attributes['digest'], $article->getDigest());
    }

    public function testSetContentSourceUrl()
    {
        $article = new MPNewsArticle();
        $article->setContentSourceUrl(static::$attributes['content_source_url']);

        $this->assertEquals(static::$attributes['content_source_url'], $article->getContentSourceUrl());
    }

    public function testSetAuthor()
    {
        $article = new MPNewsArticle();
        $article->setAuthor(static::$attributes['author']);

        $this->assertEquals(static::$attributes['author'], $article->getAuthor());
    }

    public function testSetTitleDescriptionUrlBtnText()
    {
        $article = new MPNewsArticle();
        $article->setTitle(static::$attributes['title'])
             ->setThumbMediaId(static::$attributes['thumb_media_id'])
             ->setContent(static::$attributes['content'])
             ->setDigest(static::$attributes['digest'])
             ->setContentSourceUrl(static::$attributes['content_source_url'])
             ->setAuthor(static::$attributes['author']);

        $this->assertEquals(static::$attributes, $article->toArray());
    }
}