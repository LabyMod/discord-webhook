<?php
declare(strict_types=1);

namespace DiscordWebhook;

use DateTime;
use DiscordWebhook\Embed\Author;
use DiscordWebhook\Embed\Field;
use DiscordWebhook\Embed\Footer;
use DiscordWebhook\Embed\Image;
use DiscordWebhook\Embed\Provider;
use DiscordWebhook\Embed\Thumbnail;
use DiscordWebhook\Embed\Video;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Embed
 *
 * @author Scrummer <scrummer@gmx.ch>
 * @package DiscordWebhook
 */
class Embed
{
    /**
     * Embed base config
     */
    public const CONFIG_MAX_COUNT = 10;

    /** @deprecated Use \DiscordWebhook\EmbedColor::class instead */
    public const COLOR_DEFAULT     = EmbedColor::DEFAULT;
    /** @deprecated Use \DiscordWebhook\EmbedColor::class instead */
    public const COLOR_AQUA        = EmbedColor::AQUA;
    /** @deprecated Use \DiscordWebhook\EmbedColor::class instead */
    public const COLOR_GREEN       = EmbedColor::GREEN;
    /** @deprecated Use \DiscordWebhook\EmbedColor::class instead */
    public const COLOR_BLUE        = EmbedColor::BLUE;
    /** @deprecated Use \DiscordWebhook\EmbedColor::class instead */
    public const COLOR_PURPLE      = EmbedColor::PURPLE;
    /** @deprecated Use \DiscordWebhook\EmbedColor::class instead */
    public const COLOR_GOLD        = EmbedColor::GOLD;
    /** @deprecated Use \DiscordWebhook\EmbedColor::class instead */
    public const COLOR_ORANGE      = EmbedColor::ORANGE;
    /** @deprecated Use \DiscordWebhook\EmbedColor::class instead */
    public const COLOR_RED         = EmbedColor::RED;
    /** @deprecated Use \DiscordWebhook\EmbedColor::class instead */
    public const COLOR_GREY        = EmbedColor::GREY;
    /** @deprecated Use \DiscordWebhook\EmbedColor::class instead */
    public const COLOR_DARKER_GREY = EmbedColor::DARKER_GREY;
    /** @deprecated Use \DiscordWebhook\EmbedColor::class instead */
    public const COLOR_NAVY        = EmbedColor::NAVY;
    /** @deprecated Use \DiscordWebhook\EmbedColor::class instead */
    public const COLOR_DARK_AQUA   = EmbedColor::DARK_AQUA;
    /** @deprecated Use \DiscordWebhook\EmbedColor::class instead */
    public const COLOR_DARK_GREEN  = EmbedColor::DARK_GREEN;
    /** @deprecated Use \DiscordWebhook\EmbedColor::class instead */
    public const COLOR_DARK_BLUE   = EmbedColor::DARK_BLUE;
    /** @deprecated Use \DiscordWebhook\EmbedColor::class instead */
    public const COLOR_DARK_PURPLE = EmbedColor::DARK_PURPLE;
    /** @deprecated Use \DiscordWebhook\EmbedColor::class instead */
    public const COLOR_DARK_GOLD   = EmbedColor::DARK_GOLD;
    /** @deprecated Use \DiscordWebhook\EmbedColor::class instead */
    public const COLOR_DARK_ORANGE = EmbedColor::DARK_ORANGE;
    /** @deprecated Use \DiscordWebhook\EmbedColor::class instead */
    public const COLOR_DARK_RED    = EmbedColor::DARK_RED;
    /** @deprecated Use \DiscordWebhook\EmbedColor::class instead */
    public const COLOR_DARK_GREY   = EmbedColor::DARK_GREY;
    /** @deprecated Use \DiscordWebhook\EmbedColor::class instead */
    public const COLOR_LIGHT_GREY  = EmbedColor::LIGHT_GREY;
    /** @deprecated Use \DiscordWebhook\EmbedColor::class instead */
    public const COLOR_DARK_NAVY   = EmbedColor::DARK_NAVY;

    private ?string $title;

    private ?string $type = 'rich';

    private ?string $description;

    private ?string $url;

    private ?DateTime $timestamp;

    private ?int $color;

    private ?Footer $footer;

    private ?Image $image;

    private ?Thumbnail $thumbnail;

    private ?Video $video;

    private ?Provider $provider;

    private ?Author $author;

    private array|null|ArrayCollection $fields;

    public function __construct()
    {
        $this->fields = new ArrayCollection();
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): Embed
    {
        $this->title = $title;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): Embed
    {
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): Embed
    {
        $this->description = $description;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): Embed
    {
        $this->url = $url;

        return $this;
    }

    public function getTimestamp(): ?DateTime
    {
        return $this->timestamp;
    }

    public function setTimestamp(?DateTime $timestamp): Embed
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getColor(): ?int
    {
        return $this->color;
    }

    public function setColor(?int $color): Embed
    {
        $this->color = $color;

        return $this;
    }

    public function getFooter(): ?Footer
    {
        return $this->footer;
    }

    public function setFooter(?Footer $footer): Embed
    {
        $this->footer = $footer;

        return $this;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(?Image $image): Embed
    {
        $this->image = $image;

        return $this;
    }

    public function getThumbnail(): ?Thumbnail
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?Thumbnail $thumbnail): Embed
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function getVideo(): ?Video
    {
        return $this->video;
    }

    public function setVideo(?Video $video): Embed
    {
        $this->video = $video;

        return $this;
    }

    public function getProvider(): ?Provider
    {
        return $this->provider;
    }

    public function setProvider(?Provider $provider): Embed
    {
        $this->provider = $provider;

        return $this;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(?Author $author): Embed
    {
        $this->author = $author;

        return $this;
    }

    public function getFields(): ArrayCollection|array|null
    {
        return $this->fields->isEmpty() ? null : $this->fields->toArray();
    }

    public function addField(Field $field): Embed
    {
        $this->fields->add($field);

        return $this;
    }
}
