<?php
declare(strict_types=1);

namespace DiscordWebhook\Test;

use DiscordWebhook\Webhook;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractTestCase
 *
 * @package DiscordWebhook\Test
 * @author Scrummer <scrummer@gmx.ch>
 */
class AbstractTestCase extends TestCase
{
    /**
     * @var Webhook
     */
    protected $webhook;

    /**
     * @var string
     */
    private $testUrl;

    protected function setUp(): void
    {
        $this->webhook = new Webhook($this->getTestUrl());

        if ($this->getTestUrl() === '') {
            throw new \LogicException('Cannot test webhook without test URL. Please provide it as environment variable in the docker-compose.yml file.');
        }
    }

    protected function getTestUrl(): ?string
    {
        if (null === $this->webhook) {
            $this->testUrl = getenv('DISCORD_TEST_URL') ?: '';
        }

        return $this->testUrl;
    }
}
