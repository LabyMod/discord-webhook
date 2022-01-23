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
    private ?string $iconUrl;

    private ?string $proxyIconUrl;

    public function getIconUrl(): ?string
    {
        return $this->iconUrl;
    }

    public function setIconUrl(?string $iconUrl): self
    {
        $this->iconUrl = $iconUrl;

        return $this;
    }

    public function getProxyIconUrl(): ?string
    {
        return $this->proxyIconUrl;
    }

    public function setProxyIconUrl(?string $proxyIconUrl): self
    {
        $this->proxyIconUrl = $proxyIconUrl;

        return $this;
    }
}
