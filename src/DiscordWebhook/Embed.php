<?php
declare(strict_types=1);

namespace DiscordWebhook;

use Carbon\Carbon;
use DiscordWebhook\Embed\Author;
use DiscordWebhook\Embed\Field;
use DiscordWebhook\Embed\Footer;
use DiscordWebhook\Embed\Image;
use DiscordWebhook\Embed\Provider;
use DiscordWebhook\Embed\Thumbnail;
use DiscordWebhook\Embed\Video;

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
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $type = 'rich';

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $url;

    /**
     * @var Carbon
     */
    private $timestamp;

    /**
     * @var int
     */
    private $color;

    /**
     * @var Footer
     */
    private $footer;

    /**
     * @var Image
     */
    private $image;

    /**
     * @var Thumbnail
     */
    private $thumbnail;

    /**
     * @var Video
     */
    private $video;

    /**
     * @var Provider
     */
    private $provider;

    /**
     * @var Author
     */
    private $author;

    /**
     * @var Field[]
     */
    private $fields;
}
