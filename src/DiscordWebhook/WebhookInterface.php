<?php
declare(strict_types=1);

namespace DiscordWebhook;

/**
 * Interface WebhookInterface
 *
 * @author Scrummer <scrummer@gmx.ch>
 * @package DiscordWebhook
 */
interface WebhookInterface
{
    /**
     * WebhookInterface constructor.
     *
     * @param string $url
     */
    public function __construct(string $url);

    /**
     * Execute the webhook
     *
     * @return bool True on success, false otherwise
     */
    public function send(): bool;

    /**
     * Send the message as Text-To-Speech message
     *
     * @param bool $tts
     *
     * @return WebhookInterface
     */
    public function setTts(bool $tts = false): self;

    /**
     * Set the username of the bot
     *
     * @param string $username
     *
     * @return WebhookInterface
     */
    public function setUsername(string $username): self;

    /**
     * Set the avatar of the bot
     *
     * @param string $url
     *
     * @return WebhookInterface
     */
    public function setAvatar(string $url): self;

    /**
     * SEt the message that should be sent
     *
     * @param string $message
     *
     * @return WebhookInterface
     */
    public function setMessage(string $message): self;

    /**
     * Add a file to the message
     *
     * @param \SplFileInfo $file
     *
     * @return WebhookInterface
     */
    public function setFile(\SplFileInfo $file): self;
}
