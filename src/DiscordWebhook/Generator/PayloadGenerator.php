<?php
declare(strict_types=1);

namespace DiscordWebhook\Generator;

use DateTime;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\YamlFileLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Class PayloadGenerator
 *
 * @package DiscordWebhook\Generator
 * @author Scrummer <scrummer@gmx.ch>
 */
class PayloadGenerator
{
    /**
     * @var Serializer
     */
    private $serializer;

    public function __construct()
    {
        $classMetadataFactory = new ClassMetadataFactory(new YamlFileLoader(__DIR__ . '/../../config/serializer/definition.yml'));
        $metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory);
        $defaultContext = [
            ObjectNormalizer::CALLBACKS => [
                'timestamp' => [$this, 'formatTimestamp']
            ],
            ObjectNormalizer::SKIP_NULL_VALUES => true
        ];

        $normalizer = new ObjectNormalizer(
            $classMetadataFactory,
            $metadataAwareNameConverter,
            null,
            null,
            null,
            null,
            $defaultContext
        );

        $this->serializer = new Serializer([$normalizer], [new JsonEncoder()]);
    }

    public function generate(object $object): array
    {
        return $this->serializer->normalize(
            $object,
            null,
            [
                'groups' => ['discord']
            ]
        );
    }

    public function formatTimestamp($dateTime): ?string
    {
        return $dateTime instanceof DateTime ? $dateTime->format(DateTime::ATOM) : null;
    }
}
