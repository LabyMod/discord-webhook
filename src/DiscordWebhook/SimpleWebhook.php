<?php
declare(strict_types=1);

namespace DiscordWebhook;

use DiscordWebhook\Exception\DiscordWebhookException;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

/**
 * Class SimpleWebhook
 *
 * @author Scrummer <scrummer@gmx.ch>
 * @package DiscordWebhook
 */
class SimpleWebhook extends Webhook
{
    private static ?string $defaultUrl = null;

    private static ?SimpleWebhook $instance = null;

    /**
     * Send a message instantly.
     *
     * @param string      $message The message to be sent
     * @param string|null $url A specific url if you want to override the default one
     *
     * @throws ExceptionInterface
     * @throws GuzzleException
     */
    public static function sendMessage(string $message, string $url = null): bool
    {
        if (self::$instance === null) {
            self::$instance = self::createInstance($url);
        }

        return self::$instance->setMessage($message)->send();
    }

    private static function createInstance(?string $url = null): SimpleWebhook
    {
        self::$defaultUrl = $url;

        if (self::$defaultUrl === null && array_key_exists('DWH_DEFAULT_URL', $_ENV)) {
            self::$defaultUrl = $_ENV['DWH_DEFAULT_URL'] ?? null;
        }

        if (self::$defaultUrl === null) {
            throw new DiscordWebhookException('No default URL has been set. Either add the `DWH_DEFAULT_URL` env variable or pass it to the `sendMessage` method.');
        }

        return new self(self::$defaultUrl);
    }
}
