# Discord Webhook
Send Discord messages directly from your PHP application. Even with embeds & files!

## Installation

**Composer installation**
```bash
composer require labymod/discord-webhook
```

## Documentation
Hop into the wonderful world of webhooks with just those few lines:
```php
use DiscordWebhook\Webhook;

$wh = new Webhook('https://my.webhook/url');
$wh
    ->setMessage('Hello world!')
    ->send();
```

For further documentation have a look here:

* [Basics](docs/01_Basics.md)
* [Sending Files](docs/02_SendingFiles.md)
* [Embeds](docs/03_Embeds.md)
