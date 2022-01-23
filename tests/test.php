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
    /*->addEmbed(
        (new \DiscordWebhook\Embed())
    )*/;

$wh->send();

exit(0);
