<?php
declare(strict_types=1);

namespace DiscordWebhook;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class Webhook
 *
 * @author Scrummer <scrummer@gmx.ch>
 * @package DiscordWebhook
 */
class Webhook implements WebhookInterface
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $avatar;

    /**
     * @var string
     */
    private $message;

    /**
     * @var bool
     */
    private $tts;

    /**
     * @var array
     */
    private $file;

    /**
     * Constructor.
     *
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->client = new Client([
            'base_uri' => $url
        ]);
    }

    /**
     * Send the Webhook
     *
     * @return bool
     * @throws GuzzleException
     */
    public function send(): bool
    {
        $response = $this->client->request(
            'POST',
            $this->client->getConfig('base_uri')->getPath(),
            $this->buildPayload()
        );

        return $response->getStatusCode() === 200;
    }

    private function buildPayload(): array
    {
        $fields  = [
            'username' => 'username',
            'avatar'   => 'avatar_url',
            'message'  => 'content',
            'tts'      => 'tts',
            'file'     => 'file',
            'embeds'   => 'embeds'
        ];
        $payload = [
            'multipart' => []
        ];

        foreach ($fields as $field => $payloadField) {
            if (!property_exists($this, $field) || null === $this->$field) {
                continue;
            }

            if (is_string($this->$field) || is_bool($this->$field)) { // add string and booloan values
                $payload['multipart'][] = [
                    'name'     => $payloadField,
                    'contents' => $this->$field
                ];
            } elseif ($this->$field instanceof \SplFileInfo) { // add file
                /** @var \SplFileInfo $file */
                $file = $this->$field;

                $payload['multipart'][] = [
                    'name'     => $payloadField,
                    'contents' => $file->openFile()->fread($file->getSize()),
                    'filename' => $file->getFilename()
                ];
            }
        }

        return $payload;
    }

    /**
     * @param bool $tts
     *
     * @return WebhookInterface
     */
    public function setTts(bool $tts = false): WebhookInterface
    {
        $this->tts = $tts;

        return $this;
    }

    /**
     * @param string $username
     *
     * @return WebhookInterface
     */
    public function setUsername(string $username): WebhookInterface
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @param string $url
     *
     * @return WebhookInterface
     */
    public function setAvatar(string $url): WebhookInterface
    {
        $this->avatar = $url;

        return $this;
    }

    /**
     * @param string $message
     *
     * @return WebhookInterface
     */
    public function setMessage(string $message): WebhookInterface
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @param \SplFileInfo $file
     *
     * @return WebhookInterface
     */
    public function setFile(\SplFileInfo $file): WebhookInterface
    {
        $this->file = $file;

        return $this;
    }
}
