<?php
declare(strict_types=1);

namespace DiscordWebhook\Embed;

use DiscordWebhook\Embed\Traits\NameableTrait;

/**
 * Class Provider
 *
 * @package DiscordWebhook\Embed
 * @author Scrummer <scrummer@gmx.ch>
 */
class Provider
{
    use NameableTrait;

    private ?string $url;

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): Provider
    {
        $this->url = $url;

        return $this;
    }
}
