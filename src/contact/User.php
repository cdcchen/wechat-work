<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/18
 * Time: 11:42
 */

namespace cdcchen\wework\contact;


use cdcchen\wework\base\AttributeArray;

class User extends AttributeArray
{
    /**
     * @param string $id
     * @return static
     */
    public function setUserId(string $id): self
    {
        $this->set('user_id', $id);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getUserId(): ?string
    {
        return $this->get('user_id');
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
     * @param string $name
     * @return static
     */
    public function setEnglishName(string $name): self
    {
        $this->set('english_name', $name);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getEnglishName(): ?string
    {
        return $this->get('english_name');
    }

    /**
     * @param string $mobile
     * @return static
     */
    public function setMobile(string $mobile): self
    {
        $this->set('mobile', $mobile);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getMobile(): ?string
    {
        return $this->get('mobile');
    }

    /**
     * @param array $department
     * @param array|null $order
     * @return static
     */
    public function setDepartment(array $department, array $order = null): self
    {
        $this->set('department', $department);
        if ($order !== null) {
            $this->set('order', $order);
        }
        return $this;
    }

    /**
     * @return array|null
     */
    public function getDepartment(): ?array
    {
        return $this->get('department');
    }

    /**
     * @return array|null
     */
    public function getOrder(): ?array
    {
        return $this->get('order');
    }

    /**
     * @param string $position
     * @return static
     */
    public function setPosition(string $position): self
    {
        $this->set('position', $position);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPosition(): ?string
    {
        return $this->get('position');
    }

    /**
     * @param string $gender
     * @return static
     */
    public function setGender(string $gender): self
    {
        $this->set('gender', $gender);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getGender(): ?string
    {
        return $this->get('gender');
    }

    /**
     * @param string $email
     * @return static
     */
    public function setEmail(string $email): self
    {
        $this->set('email', $email);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->get('email');
    }

    /**
     * @param string $telephone
     * @return static
     */
    public function setTelephone(string $telephone): self
    {
        $this->set('telephone', $telephone);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTelephone(): ?string
    {
        return $this->get('telephone');
    }

    /**
     * @param string $avatarMediaId
     * @return static
     */
    public function setAvatarMediaId(string $avatarMediaId): self
    {
        $this->set('avatar_mediaid', $avatarMediaId);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAvatarMediaId(): ?string
    {
        return $this->get('avatar_mediaid');
    }

    /**
     * @param bool $enable
     * @return static
     */
    public function setEnable(bool $enable): self
    {
        $this->set('enable', (int)$enable);
        return $this;
    }

    /**
     * @return int|null
     */
    public function getEnable(): ?int
    {
        return $this->get('enable');
    }

    /**
     * @param array $extAttr
     * @return static
     */
    public function setExtAttr(array $extAttr): self
    {
        $this->set('extattr', $extAttr);
        return $this;
    }

    /**
     * @return array|null
     */
    public function getExtAttr(): ?array
    {
        return $this->get('extattr');
    }
}