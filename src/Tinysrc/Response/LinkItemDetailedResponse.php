<?php

namespace Tinysrc\Response;

use JMS\Serializer\Annotation as Serializer;

class LinkItemDetailedResponse
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
     * @Serializer\SerializedName("clicks")
     * @Serializer\Type("int")
     * @Serializer\Groups("details")
     * @Serializer\Since("1.0.0")
     *
     * @var int
     */
    private $clicks;

    /**
     * @Serializer\SerializedName("bots")
     * @Serializer\Type("int")
     * @Serializer\Groups("details")
     * @Serializer\Since("1.0.0")
     *
     * @var int
     */
    private $bots;

    /**
     * @Serializer\SerializedName("active")
     * @Serializer\Type("bool")
     * @Serializer\Groups("details")
     * @Serializer\Since("1.0.0")
     *
     * @var bool
     */
    private $active;

    /**
     * @Serializer\SerializedName("qr_code")
     * @Serializer\Type("string")
     * @Serializer\Groups("details")
     * @Serializer\Since("1.0.0")
     *
     * @var string
     */
    private $qrCode;

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

    /**
     * @return int
     */
    public function getClicks(): int
    {
        return $this->clicks;
    }

    /**
     * @param int $clicks
     * @return LinkItemResponse
     */
    public function setClicks(int $clicks)
    {
        $this->clicks = $clicks;
        return $this;
    }

    /**
     * @return int
     */
    public function getBots(): int
    {
        return $this->bots;
    }

    /**
     * @param int $bots
     * @return LinkItemResponse
     */
    public function setBots(int $bots)
    {
        $this->bots = $bots;
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
     * @return LinkItemResponse
     */
    public function setActive(bool $active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return string
     */
    public function getQrCode(): string
    {
        return $this->qrCode;
    }

    /**
     * @param string $qrCode
     * @return LinkItemResponse
     */
    public function setQrCode(string $qrCode)
    {
        $this->qrCode = $qrCode;
        return $this;
    }
}
