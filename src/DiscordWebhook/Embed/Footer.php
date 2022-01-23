<?php
declare(strict_types=1);

namespace DiscordWebhook\Embed;

use DiscordWebhook\Embed\Traits\IconTrait;

/**
 * Class Footer
 *
 * @package DiscordWebhook\Embed
 * @author Scrummer <scrummer@gmx.ch>
 */
class Footer
{
    use IconTrait;

    private string $text;

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): Footer
    {
        $this->text = $text;

        return $this;
    }
}
