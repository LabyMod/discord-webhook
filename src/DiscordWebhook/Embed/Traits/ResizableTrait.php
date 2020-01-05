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
    /**
     * @var int|null
     */
    private $width;

    /**
     * @var int|null
     */
    private $height;

    /**
     * @return int|null
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * @param int|null $width
     *
     * @return self
     */
    public function setWidth(?int $width): self
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * @param int|null $height
     *
     * @return self
     */
    public function setHeight(?int $height): self
    {
        $this->height = $height;

        return $this;
    }
}
