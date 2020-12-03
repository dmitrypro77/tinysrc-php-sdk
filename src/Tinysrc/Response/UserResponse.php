<?php

namespace Tinysrc\Response;

use JMS\Serializer\Annotation as Serializer;

class UserResponse
{
    /**
     * @Serializer\SerializedName("username")
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     *
     * @var string
     */
    private $username;

    /**
    * @Serializer\SerializedName("email")
    * @Serializer\Type("string")
    * @Serializer\Since("1.0.0")
    *
    * @var string
    */
    private $email;

    /**
     * @Serializer\SerializedName("api_key")
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     *
     * @var string
     */
    private $apiKey;

    /**
     * @Serializer\SerializedName("active")
     * @Serializer\Type("bool")
     * @Serializer\Since("1.0.0")
     *
     * @var bool
     */
    private $active;

    /**
     * @Serializer\SerializedName("plan")
     * @Serializer\Type("int")
     * @Serializer\Since("1.0.0")
     *
     * @var int
     */
    private $plan;

    /**
     * @Serializer\SerializedName("banned")
     * @Serializer\Type("bool")
     * @Serializer\Since("1.0.0")
     *
     * @var bool
     */
    private $banned;

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return UserResponse
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return UserResponse
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     * @return UserResponse
     */
    public function setApiKey(string $apiKey)
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return UserResponse
     */
    public function setActive(bool $active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return int
     */
    public function getPlan(): int
    {
        return $this->plan;
    }

    /**
     * @param int $plan
     * @return UserResponse

     */
    public function setPlan(int $plan)
    {
        $this->plan = $plan;
        return $this;
    }

    /**
     * @return bool
     */
    public function isBanned(): bool
    {
        return $this->banned;
    }

    /**
     * @param bool $banned
     * @return UserResponse
     */
    public function setBanned(bool $banned)
    {
        $this->banned = $banned;
        return $this;
    }
}
