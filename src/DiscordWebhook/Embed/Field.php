<?php
declare(strict_types=1);

namespace DiscordWebhook\Embed;

/**
 * Class Field
 *
 * @package DiscordWebhook\Embed
 * @author Scrummer <scrummer@gmx.ch>
 */
class Field
{
    private string $name;

    private string $value;

    private ?bool $isInline;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Field
    {
        $this->name = $name;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): Field
    {
        $this->value = $value;

        return $this;
    }

    public function getIsInline(): ?bool
    {
        return $this->isInline;
    }

    public function setIsInline(?bool $isInline): Field
    {
        $this->isInline = $isInline;

        return $this;
    }
}
