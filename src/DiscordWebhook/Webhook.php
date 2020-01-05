<?php
declare(strict_types=1);

namespace DiscordWebhook;

use DiscordWebhook\Generator\PayloadGenerator;
use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\Client;
use RuntimeException;
use SplFileInfo;

/**
 * Class Webhook
 *
 * @author Scrummer <scrummer@gmx.ch>
 * @package DiscordWebhook
 */
class Webhook
{
    /**
     * @var Client[]|ArrayCollection
     */
    private $clients;

    /**
     * @var null|string
     */
    private $username;

    /**
     * @var null|string
     */
    private $avatar;

    /**
     * @var null|string
     */
    private $message;

    /**
     * @var null|bool
     */
    private $isTts;

    /**
     * @var null|SplFileInfo
     */
    private $file;

    /**
     * @var Embed[]|ArrayCollection
     */
    private $embeds;

    /**
     * @var PayloadGenerator
     */
    private $payloadGenerator;

    /**
     * Constructor.
     *
     * @param array $url
     */
    public function __construct(array $url)
    {
        $this->embeds = new ArrayCollection();
        $this->clients = new ArrayCollection();
        $this->payloadGenerator = new PayloadGenerator();

        foreach ($url as $webhook) {
            $this->clients->add(new Client([
                'base_uri' => $webhook
            ]));
        }
    }

    /**
     * Send the Webhook
     *
     * @return bool
     */
    public function send(): bool
    {
        /** @var int[] $responseCodes */
        $responseCodes = [];
        $payload = $this->buildPayload();

        $this->clients->forAll(static function (int $key, Client $client) use ($payload) {
            $responseCodes[] = $client->request(
                'POST',
                $client->getConfig('base_uri')->getPath(),
                $payload
            )->getStatusCode();
        });

        foreach ($responseCodes as $responseCode) {
            if (!in_array($responseCode, [200, 201, 202, 204], true)) {
                return false;
            }
        }

        return true;
    }

    private function buildPayload(): array
    {
        dump($this->payloadGenerator->generate($this));

        exit;
        // ==============================
        $fields = [
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
            } elseif ($this->$field instanceof SplFileInfo) { // add file
                /** @var SplFileInfo $file */
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
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     *
     * @return Webhook
     */
    public function setUsername(?string $username): Webhook
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    /**
     * @param string|null $avatar
     *
     * @return Webhook
     */
    public function setAvatar(?string $avatar): Webhook
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     *
     * @return Webhook
     */
    public function setMessage(?string $message): Webhook
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsTts(): ?bool
    {
        return $this->isTts;
    }

    /**
     * @param bool|null $isTts
     *
     * @return Webhook
     */
    public function setIsTts(?bool $isTts): Webhook
    {
        $this->isTts = $isTts;

        return $this;
    }

    /**
     * @return SplFileInfo|null
     */
    public function getFile(): ?SplFileInfo
    {
        return $this->file;
    }

    /**
     * @param SplFileInfo|null $file
     *
     * @return Webhook
     */
    public function setFile(?SplFileInfo $file): Webhook
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Add an embed to the message.
     *
     * @param Embed $embed
     *
     * @return int The index of the recently added embed
     */
    public function addEmbed(Embed $embed): int
    {
        if ($this->embeds->count() >= Embed::CONFIG_MAX_COUNT) {
            throw new RuntimeException(sprintf('Maximum amount of embeds reached for this message. Discord allows only %d embeds.', Embed::CONFIG_MAX_COUNT));
        }

        $this->embeds->add($embed);

        return (int)$this->embeds->indexOf($embed);
    }

    /**
     * @return array|null
     */
    public function getEmbeds(): ?array
    {
        return $this->embeds->isEmpty() ? null : $this->embeds->toArray();
    }
}
