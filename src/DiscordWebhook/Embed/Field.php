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
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $value;

    /**
     * @var bool|null
     */
    private $isInline;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return self
     */
    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsInline(): ?bool
    {
        return $this->isInline;
    }

    /**
     * @param bool|null $isInline
     *
     * @return self
     */
    public function setIsInline(?bool $isInline): self
    {
        $this->isInline = $isInline;

        return $this;
    }
}
