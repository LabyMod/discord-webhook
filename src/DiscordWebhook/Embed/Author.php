<?php
declare(strict_types=1);

namespace DiscordWebhook\Embed;

use DiscordWebhook\Embed\Traits\IconTrait;
use DiscordWebhook\Embed\Traits\NameableTrait;

/**
 * Class Author
 *
 * @package DiscordWebhook\Embed
 * @author Scrummer <scrummer@gmx.ch>
 */
class Author
{
    use NameableTrait;
    use IconTrait;

    /**
     * @var string
     */
    private $url;
}
