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

    /**
     * @var string|null
     */
    private $url;

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
}
