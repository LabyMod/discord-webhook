<?php
declare(strict_types=1);

namespace DiscordWebhook\Embed\Traits;

/**
 * Trait ResizableTrait
 *
 * @package DiscordWebhook\Embed\Traits
 * @author Scrummer <scrummer@gmx.ch>
 */
trait IconTrait
{
    /**
     * @var string|null
     */
    private $iconUrl;

    /**
     * @var string|null
     */
    private $proxyIconUrl;

    /**
     * @return string|null
     */
    public function getIconUrl(): ?string
    {
        return $this->iconUrl;
    }

    /**
     * @param string|null $iconUrl
     *
     * @return self
     */
    public function setIconUrl(?string $iconUrl): self
    {
        $this->iconUrl = $iconUrl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getProxyIconUrl(): ?string
    {
        return $this->proxyIconUrl;
    }

    /**
     * @param string|null $proxyIconUrl
     *
     * @return self
     */
    public function setProxyIconUrl(?string $proxyIconUrl): self
    {
        $this->proxyIconUrl = $proxyIconUrl;

        return $this;
    }
}
