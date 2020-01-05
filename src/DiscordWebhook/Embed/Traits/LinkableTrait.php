<?php
declare(strict_types=1);

namespace DiscordWebhook\Embed\Traits;

/**
 * Trait LinkableTrait
 *
 * @package DiscordWebhook\Embed\Traits
 * @author Scrummer <scrummer@gmx.ch>
 */
trait LinkableTrait
{
    /**
     * @var string|null
     */
    private $url;

    /**
     * @var string|null
     */
    private $proxyUrl;

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     *
     * @return self
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getProxyUrl(): ?string
    {
        return $this->proxyUrl;
    }

    /**
     * @param string|null $proxyUrl
     *
     * @return self
     */
    public function setProxyUrl(?string $proxyUrl): self
    {
        $this->proxyUrl = $proxyUrl;

        return $this;
    }
}
