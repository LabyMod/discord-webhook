<?php
declare(strict_types=1);

namespace DiscordWebhook\Embed;

use DiscordWebhook\Embed\Traits\ResizableTrait;

/**
 * Class Video
 *
 * @package DiscordWebhook\Embed
 * @author Scrummer <scrummer@gmx.ch>
 */
class Video
{
    use ResizableTrait;

    /**
     * @var string
     */
    private $url;
}
