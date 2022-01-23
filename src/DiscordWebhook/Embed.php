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

    private ?string $title;

    private ?string $type = 'rich';

    private ?string $description;

    private ?string $url;

    private ?DateTime $timestamp;

    private EmbedColor $color = EmbedColor::DEFAULT;

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

    public function getColor(): EmbedColor
    {
        return $this->color;
    }

    public function setColor(EmbedColor $color): Embed
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
