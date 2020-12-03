<?php

namespace Tinysrc\Response;

use JMS\Serializer\Annotation as Serializer;

class LinkItemResponse
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
     * @Serializer\SerializedName("stat_url")
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     *
     * @var string
     */
    private $statUrl;

    /**
     * @Serializer\SerializedName("stat_password")
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     *
     * @var string
     */
    private $statPassword;

    /**
     * @Serializer\SerializedName("password")
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     *
     * @var string
     */
    private $password;

    /**
     * @Serializer\SerializedName("auth_required")
     * @Serializer\Type("boolean")
     * @Serializer\Since("1.0.0")
     *
     * @var boolean
     */
    private $authRequired;

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return LinkItemResponse
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatUrl()
    {
        return $this->statUrl;
    }

    /**
     * @param string $statUrl
     * @return LinkItemResponse
     */
    public function setStatUrl(string $statUrl)
    {
        $this->statUrl = $statUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatPassword()
    {
        return $this->statPassword;
    }

    /**
     * @param string $statPassword
     * @return LinkItemResponse
     */
    public function setStatPassword(string $statPassword)
    {
        $this->statPassword = $statPassword;
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
     * @return LinkItemResponse
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAuthRequired()
    {
        return $this->authRequired;
    }

    /**
     * @param bool $authRequired
     * @return LinkItemResponse
     */
    public function setAuthRequired(bool $authRequired)
    {
        $this->authRequired = $authRequired;
        return $this;
    }
}
