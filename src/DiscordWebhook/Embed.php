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

    /**
     * Embed colors
     */
    public const COLOR_DEFAULT     = 0;
    public const COLOR_AQUA        = 1752220;
    public const COLOR_GREEN       = 3066993;
    public const COLOR_BLUE        = 3447003;
    public const COLOR_PURPLE      = 10181046;
    public const COLOR_GOLD        = 15844367;
    public const COLOR_ORANGE      = 15105570;
    public const COLOR_RED         = 15158332;
    public const COLOR_GREY        = 9807270;
    public const COLOR_DARKER_GREY = 8359053;
    public const COLOR_NAVY        = 3426654;
    public const COLOR_DARK_AQUA   = 1146986;
    public const COLOR_DARK_GREEN  = 2067276;
    public const COLOR_DARK_BLUE   = 2123412;
    public const COLOR_DARK_PURPLE = 7419530;
    public const COLOR_DARK_GOLD   = 12745742;
    public const COLOR_DARK_ORANGE = 11027200;
    public const COLOR_DARK_RED    = 10038562;
    public const COLOR_DARK_GREY   = 9936031;
    public const COLOR_LIGHT_GREY  = 12370112;
    public const COLOR_DARK_NAVY   = 2899536;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string|null
     */
    private $type = 'rich';

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var string|null
     */
    private $url;

    /**
     * @var DateTime|null
     */
    private $timestamp;

    /**
     * @var int|null
     */
    private $color;

    /**
     * @var Footer|null
     */
    private $footer;

    /**
     * @var Image|null
     */
    private $image;

    /**
     * @var Thumbnail|null
     */
    private $thumbnail;

    /**
     * @var Video|null
     */
    private $video;

    /**
     * @var Provider|null
     */
    private $provider;

    /**
     * @var Author|null
     */
    private $author;

    /**
     * @var Field[]|ArrayCollection|null
     */
    private $fields;

    public function __construct()
    {
        $this->fields = new ArrayCollection();
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     *
     * @return Embed
     */
    public function setTitle(?string $title): Embed
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     *
     * @return Embed
     */
    public function setType(?string $type): Embed
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return Embed
     */
    public function setDescription(?string $description): Embed
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     *
     * @return Embed
     */
    public function setUrl(?string $url): Embed
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getTimestamp(): ?DateTime
    {
        return $this->timestamp;
    }

    /**
     * @param DateTime|null $timestamp
     *
     * @return Embed
     */
    public function setTimestamp(?DateTime $timestamp): Embed
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getColor(): ?int
    {
        return $this->color;
    }

    /**
     * @param int|null $color
     *
     * @return Embed
     */
    public function setColor(?int $color): Embed
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return Footer|null
     */
    public function getFooter(): ?Footer
    {
        return $this->footer;
    }

    /**
     * @param Footer|null $footer
     *
     * @return Embed
     */
    public function setFooter(?Footer $footer): Embed
    {
        $this->footer = $footer;

        return $this;
    }

    /**
     * @return Image|null
     */
    public function getImage(): ?Image
    {
        return $this->image;
    }

    /**
     * @param Image|null $image
     *
     * @return Embed
     */
    public function setImage(?Image $image): Embed
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Thumbnail|null
     */
    public function getThumbnail(): ?Thumbnail
    {
        return $this->thumbnail;
    }

    /**
     * @param Thumbnail|null $thumbnail
     *
     * @return Embed
     */
    public function setThumbnail(?Thumbnail $thumbnail): Embed
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * @return Video|null
     */
    public function getVideo(): ?Video
    {
        return $this->video;
    }

    /**
     * @param Video|null $video
     *
     * @return Embed
     */
    public function setVideo(?Video $video): Embed
    {
        $this->video = $video;

        return $this;
    }

    /**
     * @return Provider|null
     */
    public function getProvider(): ?Provider
    {
        return $this->provider;
    }

    /**
     * @param Provider|null $provider
     *
     * @return Embed
     */
    public function setProvider(?Provider $provider): Embed
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * @return Author|null
     */
    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    /**
     * @param Author|null $author
     *
     * @return Embed
     */
    public function setAuthor(?Author $author): Embed
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Field[]|ArrayCollection|null
     */
    public function getFields()
    {
        return $this->fields->isEmpty() ? null : $this->fields->toArray();
    }

    /**
     * @param Field $field
     *
     * @return Embed
     */
    public function addField(Field $field): Embed
    {
        $this->fields->add($field);

        return $this;
    }
}
