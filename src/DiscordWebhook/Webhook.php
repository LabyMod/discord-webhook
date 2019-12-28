<?php
declare(strict_types=1);

namespace DiscordWebhook;

use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use RuntimeException;
use SplFileInfo;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Class Webhook
 *
 * @author Scrummer <scrummer@gmx.ch>
 * @package DiscordWebhook
 */
class Webhook implements WebhookInterface
{
    /**
     * @var Client[]|ArrayCollection
     */
    private $clients;

    /**
     * @var string
     *
     * @Groups({"discord"})
     */
    private $username;

    /**
     * @var string
     *
     * @Groups({"discord"})
     * @SerializedName("avatar_url")
     */
    private $avatar;

    /**
     * @var string
     *
     * @Groups({"discord"})
     */
    private $message;

    /**
     * @var bool
     *
     * @Groups({"discord"})
     * @SerializedName("tts")
     */
    private $isTts;

    /**
     * @var SplFileInfo
     *
     * @Groups({"discord"})
     */
    private $file;

    /**
     * @var Embed[]|ArrayCollection
     *
     * @Groups({"discord"})
     */
    private $embeds;

    /**
     * Constructor.
     *
     * @param array $url
     */
    public function __construct(array $url)
    {
        $this->embeds = new ArrayCollection();
        $this->clients = new ArrayCollection();

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
     * @param bool $isTts
     *
     * @return WebhookInterface
     */
    public function setIsTts(bool $isTts = false): WebhookInterface
    {
        $this->isTts = $isTts;

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
     * @param SplFileInfo $file
     *
     * @return WebhookInterface
     */
    public function setFile(SplFileInfo $file): WebhookInterface
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
}
