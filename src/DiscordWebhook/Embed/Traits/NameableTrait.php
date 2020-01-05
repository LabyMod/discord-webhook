<?php
declare(strict_types=1);

namespace DiscordWebhook\Embed\Traits;

/**
 * Trait NamableTrait
 *
 * @package DiscordWebhook\Embed\Traits
 * @author Scrummer <scrummer@gmx.ch>
 */
trait NameableTrait
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
