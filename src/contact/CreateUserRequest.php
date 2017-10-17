<?php
/**
 * Created by PhpStorm.
 * User: chendong
 * Date: 2017/10/16
 * Time: 14:24
 */

namespace cdcchen\wework\contact;


use cdcchen\wework\base\BaseRequest;
use Fig\Http\Message\RequestMethodInterface;

/**
 * Class CreateUserRequest
 * @package cdcchen\wework
 */
class CreateUserRequest extends BaseRequest
{
    /**
     * @var string
     */
    protected $apiUri = 'https://qyapi.weixin.qq.com/cgi-bin/user/create';
    /**
     * @var string
     */
    protected $method = RequestMethodInterface::METHOD_POST;


    /**
     * @param string $id
     * @return CreateUserRequest
     */
    public function setUserId(string $id): self
    {
        $this->bodyParams->set('user_id', $id);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getUserId(): ?string
    {
        return $this->bodyParams->get('user_id');
    }

    /**
     * @param string $name
     * @return CreateUserRequest
     */
    public function setName(string $name): self
    {
        $this->bodyParams->set('name', $name);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->bodyParams->get('name');
    }

    /**
     * @param string $name
     * @return CreateUserRequest
     */
    public function setEnglishName(string $name): self
    {
        $this->bodyParams->set('english_name', $name);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getEnglishName(): ?string
    {
        return $this->bodyParams->get('english_name');
    }

    /**
     * @param string $mobile
     * @return CreateUserRequest
     */
    public function setMobile(string $mobile): self
    {
        $this->bodyParams->set('mobile', $mobile);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getMobile(): ?string
    {
        return $this->bodyParams->get('mobile');
    }

    /**
     * @param array $department
     * @param array|null $order
     * @return CreateUserRequest
     */
    public function setDepartment(array $department, array $order = null): self
    {
        $this->bodyParams->set('department', $department);
        if ($order !== null) {
            $this->bodyParams->set('order', $order);
        }
        return $this;
    }

    /**
     * @return array|null
     */
    public function getDepartment(): ?array
    {
        return $this->bodyParams->get('department');
    }

    /**
     * @return array|null
     */
    public function getOrder(): ?array
    {
        return $this->bodyParams->get('order');
    }

    /**
     * @param string $position
     * @return CreateUserRequest
     */
    public function setPosition(string $position): self
    {
        $this->bodyParams->set('position', $position);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPosition(): ?string
    {
        return $this->bodyParams->get('position');
    }

    /**
     * @param string $gender
     * @return CreateUserRequest
     */
    public function setGender(string $gender): self
    {
        $this->bodyParams->set('gender', $gender);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getGender(): ?string
    {
        return $this->bodyParams->get('gender');
    }

    /**
     * @param string $email
     * @return CreateUserRequest
     */
    public function setEmail(string $email): self
    {
        $this->bodyParams->set('email', $email);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->bodyParams->get('email');
    }

    /**
     * @param string $telephone
     * @return CreateUserRequest
     */
    public function setTelephone(string $telephone): self
    {
        $this->bodyParams->set('telephone', $telephone);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTelephone(): ?string
    {
        return $this->bodyParams->get('telephone');
    }

    /**
     * @param string $avatarMediaId
     * @return CreateUserRequest
     */
    public function setAvatarMediaId(string $avatarMediaId): self
    {
        $this->bodyParams->set('avatar_mediaid', $avatarMediaId);
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAvatarMediaId(): ?string
    {
        return $this->bodyParams->get('avatar_mediaid');
    }

    /**
     * @param bool $enable
     * @return CreateUserRequest
     */
    public function setEnable(bool $enable): self
    {
        $this->bodyParams->set('enable', (int)$enable);
        return $this;
    }

    /**
     * @return int|null
     */
    public function getEnable(): ?int
    {
        return $this->bodyParams->get('enable');
    }

    /**
     * @param array $extAttr
     * @return CreateUserRequest
     */
    public function setExtAttr(array $extAttr): self
    {
        $this->bodyParams->set('extattr', $extAttr);
        return $this;
    }

    /**
     * @return array|null
     */
    public function getExtAttr(): ?array
    {
        return $this->bodyParams->get('extattr');
    }
}