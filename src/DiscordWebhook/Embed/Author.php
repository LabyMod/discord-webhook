<?php
declare(strict_types=1);

namespace DiscordWebhook\Embed;

use DiscordWebhook\Embed\Traits\IconTrait;
use DiscordWebhook\Embed\Traits\NameableTrait;

/**
 * Class Author
 *
 * @package DiscordWebhook\Embed
 * @author Scrummer <scrummer@gmx.ch>
 */
class Author
{
    use NameableTrait;
    use IconTrait;

    private ?string $url;

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): Author
    {
        $this->url = $url;

        return $this;
    }
}
