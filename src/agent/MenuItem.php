<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/22
 * Time: 12:16
 */

namespace cdcchen\wework\agent;


use cdcchen\wework\base\AttributeArray;

/**
 * Class MenuItem
 * @package cdcchen\wework\agent
 */
class MenuItem extends AttributeArray
{
    const TYPE_VIEW               = 'view';
    const TYPE_CLICK              = 'click';
    const TYPE_SCANCODE_PUSH      = 'scancode_push';
    const TYPE_SCANCODE_WAITMSG   = 'scancode_waitmsg';
    const TYPE_PIC_SYSPHOTO       = 'pic_sysphoto';
    const TYPE_PIC_PHOTO_OR_ALBUM = 'pic_photo_or_album';
    const TYPE_PIC_WEIXIN         = 'pic_weixin';
    const TYPE_LOCATION_SELECT    = 'location_select';

    /**
     * @param $name
     * @param $url
     * @param null $subButton
     * @return ViewMenuItem
     */
    public static function newViewMenuItem($name, $url, $subButton = null): ViewMenuItem
    {
        $item = new ViewMenuItem([
            'type' => self::TYPE_VIEW,
            'name' => $name,
            'url' => $url,
        ]);
        if ($subButton) {
            $item->setSubButton($subButton);
        }

        return $item;
    }

    /**
     * @param $type
     * @param $name
     * @param $key
     * @param null $subButton
     * @return EventMenuItem
     */
    public static function newEventMenuItem($type, $name, $key, $subButton = null): EventMenuItem
    {
        $item = new EventMenuItem([
            'type' => $type,
            'name' => $name,
            'key' => $key,
        ]);
        if ($subButton) {
            $item->setSubButton($subButton);
        }

        return $item;
    }

    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): self
    {
        $this->set('type', $type);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->get('type');
    }

    /**
     * @param string $name
     * @return static
     */
    public function setName(string $name): self
    {
        $this->set('name', $name);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->get('name');
    }

    /**
     * @param array $menuItems
     * @return static
     */
    public function setSubButton(array $menuItems): self
    {
        $this->set('sub_button', $menuItems);
        return $this;
    }

    /**
     * @param MenuItem $menuItem
     * @return static
     */
    public function addSubButton(MenuItem $menuItem): self
    {
        $this->append('sub_button', $menuItem);
        return $this;
    }

    /**
     * @return array
     */
    public function getSubButton(): array
    {
        return $this->get('sub_button');
    }
}
