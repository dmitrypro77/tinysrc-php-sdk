<?php

namespace Tinysrc\Model;

use JMS\Serializer\Annotation as Serializer;

class Link
{
    /**
     * @Serializer\SerializedName("url")
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     *
     * @var string
     */
    private $url;

    /**
     * @Serializer\SerializedName("auth_required")
     * @Serializer\Type("int")
     * @Serializer\Since("1.0.0")
     *
     * @var int
     */
    private $authRequired;

    /**
     * @Serializer\SerializedName("password")
     * @Serializer\Type("int")
     * @Serializer\Since("1.0.0")
     *
     * @var string
     */
    private $password;

    /**
     * @Serializer\SerializedName("expiration_time")
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     *
     * @var string
     */
    private $expirationTime;

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthRequired()
    {
        return $this->authRequired;
    }

    /**
     * @param int $authRequired
     * @return $this
     */
    public function setAuthRequired(int $authRequired)
    {
        $this->authRequired = $authRequired;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return $this
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpirationTime()
    {
        return $this->expirationTime;
    }

    /**
     * @param string $expirationTime
     * @return $this
     */
    public function setExpirationTime(string $expirationTime)
    {
        $this->expirationTime = $expirationTime;
        return $this;
    }
}
