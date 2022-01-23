<?php
declare(strict_types=1);

namespace DiscordWebhook\Embed\Traits;

/**
 * Trait ResizableTrait
 *
 * @package DiscordWebhook\Embed\Traits
 * @author Scrummer <scrummer@gmx.ch>
 */
trait ResizableTrait
{
    private ?int $width;

    private ?int $height;

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(?int $height): self
    {
        $this->height = $height;

        return $this;
    }
}
