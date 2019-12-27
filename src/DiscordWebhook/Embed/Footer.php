<?php
declare(strict_types=1);

namespace DiscordWebhook\Embed;

use DiscordWebhook\Embed\Traits\IconTrait;

/**
 * Class Footer
 *
 * @package DiscordWebhook\Embed
 * @author Scrummer <scrummer@gmx.ch>
 */
class Footer
{
    use IconTrait;

    /**
     * @var string
     */
    private $text;
}
