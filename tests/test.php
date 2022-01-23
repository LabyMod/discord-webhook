<?php
declare(strict_types=1);

if (PHP_SAPI !== 'cli') {
    echo 'Only command-line execution permitted.';

    exit(1);
}

require_once __DIR__ . '/../src/vendor/autoload.php';

if (!array_key_exists('DISCORD_TEST_URL', $_ENV)) {
    echo 'Please make sure to add `.env.local` file with `DISCORD_TEST_URL` set to a test URL';

    exit(1);
}

// CONFIGURE your Webhook below to test
$wh = new \DiscordWebhook\Webhook([
    $_ENV['DISCORD_TEST_URL']
]);

$wh
    ->setMessage('testtt')
    ->addEmbed(
        (new \DiscordWebhook\Embed())
            ->setTitle('TEST')
            ->setColor(\DiscordWebhook\EmbedColor::DARK_RED)
            ->addField(
                (new \DiscordWebhook\Embed\Field())
                    ->setIsInline(true)
                    ->setName('TestFieldName')
                    ->setValue('TestFieldValue')
            )
            ->setAuthor(
                (new \DiscordWebhook\Embed\Author())
                    ->setName('Scrummer')
                    ->setIconUrl('https://pbs.twimg.com/profile_images/1454563699587436557/KzhwN-fK_400x400.jpg')
            )
    )
    ->setFile(new SplFileInfo(__DIR__ . '/lipsum.pdf'))
;

$wh->send();

exit(0);
