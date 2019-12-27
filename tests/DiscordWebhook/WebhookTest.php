<?php
declare(strict_types=1);

namespace DiscordWebhook\Test;

use DiscordWebhook\Webhook;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class WebhookTest extends AbstractTestCase
{
    public function testInstance(): void
    {
        $client = $this->webhook;

        $this->assertInstanceOf(Webhook::class, $client);
    }

    public function testSimpleMessage(): void
    {
        $client = $this->webhook;
        $client->setMessage('test');

        try {
            $this->assertTrue($client->send());
        } catch (GuzzleException $e) {
        }
    }
}
