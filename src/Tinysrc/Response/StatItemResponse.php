<?php

namespace Tinysrc\Response;

use JMS\Serializer\Annotation as Serializer;

class StatItemResponse
{

    /**
     * @Serializer\SerializedName("ip")
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     *
     * @var string
     */
    private $ip;

    /**
     * @Serializer\SerializedName("bot")
     * @Serializer\Type("boolean")
     * @Serializer\Since("1.0.0")
     *
     * @var boolean
     */
    private $bot;

    /**
     * @Serializer\SerializedName("mobile")
     * @Serializer\Type("boolean")
     * @Serializer\Since("1.0.0")
     *
     * @var boolean
     */
    private $mobile;

    /**
     * @Serializer\SerializedName("browser")
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     *
     * @var string
     */
    private $browser;

    /**
     * @Serializer\SerializedName("os")
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     *
     * @var string
     */
    private $os;

    /**
     * @Serializer\SerializedName("platform")
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     *
     * @var string
     */
    private $platform;

    /**
     * @Serializer\SerializedName("referer")
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     *
     * @var string
     */
    private $referer;

    /**
     * @Serializer\SerializedName("browser_version")
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     *
     * @var string
     */
    private $browserVersion;

    /**
     * @Serializer\SerializedName("created")
     * @Serializer\Type("string")
     * @Serializer\Since("1.0.0")
     *
     * @var string
     */
    private $created;

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     * @return StatItemResponse
     */
    public function setIp(string $ip)
    {
        $this->ip = $ip;
        return $this;
    }

    /**
     * @return bool
     */
    public function isBot(): bool
    {
        return $this->bot;
    }

    /**
     * @param bool $bot
     * @return StatItemResponse
     */
    public function setBot(bool $bot)
    {
        $this->bot = $bot;
        return $this;
    }

    /**
     * @return bool
     */
    public function isMobile(): bool
    {
        return $this->mobile;
    }

    /**
     * @param bool $mobile
     * @return StatItemResponse
     */
    public function setMobile(bool $mobile)
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @return string
     */
    public function getBrowser(): string
    {
        return $this->browser;
    }

    /**
     * @param string $browser
     * @return StatItemResponse
     */
    public function setBrowser(string $browser)
    {
        $this->browser = $browser;
        return $this;
    }

    /**
     * @return string
     */
    public function getOs(): string
    {
        return $this->os;
    }

    /**
     * @param string $os
     * @return StatItemResponse
     */
    public function setOs(string $os)
    {
        $this->os = $os;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlatform(): string
    {
        return $this->platform;
    }

    /**
     * @param string $platform
     * @return StatItemResponse
     */
    public function setPlatform(string $platform)
    {
        $this->platform = $platform;
        return $this;
    }

    /**
     * @return string
     */
    public function getReferer(): string
    {
        return $this->referer;
    }

    /**
     * @param string $referer
     * @return StatItemResponse
     */
    public function setReferer(string $referer)
    {
        $this->referer = $referer;
        return $this;
    }

    /**
     * @return string
     */
    public function getBrowserVersion(): string
    {
        return $this->browserVersion;
    }

    /**
     * @param string $browserVersion
     * @return StatItemResponse
     */
    public function setBrowserVersion(string $browserVersion)
    {
        $this->browserVersion = $browserVersion;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreated(): string
    {
        return $this->created;
    }

    /**
     * @param string $created
     * @return StatItemResponse
     */
    public function setCreated(string $created)
    {
        $this->created = $created;
        return $this;
    }
}
