<?php
declare(strict_types=1);

namespace DiscordWebhook\Embed;

use DiscordWebhook\Embed\Traits\NameableTrait;

/**
 * Class Provider
 *
 * @package DiscordWebhook\Embed
 * @author Scrummer <scrummer@gmx.ch>
 */
class Provider
{
    use NameableTrait;

    /**
     * @var string
     */
    private $url;
}
