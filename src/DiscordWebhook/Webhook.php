<?php
declare(strict_types=1);

namespace DiscordWebhook;

use DiscordWebhook\Generator\PayloadGenerator;
use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JetBrains\PhpStorm\Pure;
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
     * @var Client[]
     */
    private array|ArrayCollection $clients;

    private ?string $username;

    private ?string $avatar;

    private ?string $message;

    private ?bool $isTts;

    private ?SplFileInfo $file;

    /**
     * @var Embed[]
     */
    private array|ArrayCollection $embeds;

    private PayloadGenerator $payloadGenerator;

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
     * @throws GuzzleException
     */
    public function send(): bool
    {
        /** @var ArrayCollection|int[] $responseCodes */
        $responseCodes = new ArrayCollection();
        $payload = $this->payloadGenerator->generate($this);

        $this->clients->forAll(function (int $key, Client $client) use ($payload, $responseCodes) {
            $responseCodes->add($client->request('POST', '', $payload)->getStatusCode());
        });

        foreach ($responseCodes->getValues() as $responseCode) {
            if (!in_array($responseCode, [200, 201, 202, 204], true)) {
                return false;
            }
        }

        return true;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): Webhook
    {
        $this->username = $username;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): Webhook
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): Webhook
    {
        $this->message = $message;

        return $this;
    }

    public function getIsTts(): ?bool
    {
        return $this->isTts;
    }

    public function setIsTts(?bool $isTts): Webhook
    {
        $this->isTts = $isTts;

        return $this;
    }

    public function getFile(): ?SplFileInfo
    {
        return $this->file;
    }

    public function setFile(?SplFileInfo $file): Webhook
    {
        $this->file = $file;

        return $this;
    }

    public function addEmbed(Embed $embed): Webhook
    {
        if ($this->embeds->count() >= Embed::CONFIG_MAX_COUNT) {
            throw new RuntimeException(sprintf('Maximum amount of embeds reached for this message. Discord allows only %d embeds.', Embed::CONFIG_MAX_COUNT));
        }

        $this->embeds->add($embed);

        return $this;
    }

    public function getEmbeds(): ?array
    {
        return $this->embeds->isEmpty() ? null : $this->embeds->toArray();
    }
}
