<?php
declare(strict_types=1);

namespace DiscordWebhook\Embed;

use DiscordWebhook\Embed\Traits\NameableTrait;

/**
 * Class Field
 *
 * @package DiscordWebhook\Embed
 * @author Scrummer <scrummer@gmx.ch>
 */
class Field
{
    use NameableTrait;

    /**
     * @var string
     */
    private $value;

    /**
     * @var bool
     */
    private $isInline;
}
