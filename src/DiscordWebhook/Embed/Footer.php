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

    /**
     * @var string
     */
    private $text;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return self
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }
}
