<?php
declare(strict_types=1);

namespace DiscordWebhook\Generator;

use DateTime;
use SplFileInfo;
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
        $classMetadataFactory = new ClassMetadataFactory(new YamlFileLoader(__DIR__ . '/../../config/serializer/definitions.yml'));
        $metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory);
        $defaultContext = [
            ObjectNormalizer::CALLBACKS => [
                'timestamp' => [$this, 'formatTimestamp'],
                'file' => [$this, 'formatFile']
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
        $data = [];
        $normalizedData = $this->serializer->normalize(
            $object,
            null,
            [
                ObjectNormalizer::ALLOW_EXTRA_ATTRIBUTES => false
            ]
        );

        if (!array_key_exists('embeds', $normalizedData)) {
            foreach ($normalizedData as $field => $content) {
                $tmpData = [
                    'name' => $field,
                    'contents' => $content
                ];

                if ($field === 'file' && $field !== null) {
                    $tmpData = $content;
                }

                $data['multipart'][] = $tmpData;
            }
        } else { // only send it as json when there are embeds
            $data['form_params']['payload_json'] = $this->serializer->encode($normalizedData, JsonEncoder::FORMAT);
        }

        return $data;
    }

    public function formatTimestamp($dateTime): ?string
    {
        return $dateTime instanceof DateTime ? $dateTime->format(DateTime::ATOM) : null;
    }

    public function formatFile($file): ?array
    {
        if ($file instanceof SplFileInfo) {
            return [
                'name' => 'file',
                'contents' => $file->openFile()->fread($file->getSize()),
                'filename' => $file->getFilename()
            ];
        }

        return null;
    }
}
