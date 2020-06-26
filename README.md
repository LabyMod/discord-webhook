# Discord Webhook
[![Latest Stable Version](https://poser.pugx.org/labymod/discord-webhook/v)](https://packagist.org/packages/labymod/discord-webhook)
[![Latest Unstable Version](https://poser.pugx.org/labymod/discord-webhook/v/unstable)](https://packagist.org/packages/labymod/discord-webhook)
[![Total Downloads](https://poser.pugx.org/labymod/discord-webhook/downloads)](https://packagist.org/packages/labymod/discord-webhook)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/LabyMod/discord-webhook/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/LabyMod/discord-webhook/?branch=master)
[![License](https://poser.pugx.org/labymod/discord-webhook/license)](https://packagist.org/packages/labymod/discord-webhook)

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

$wh = new Webhook(['https://my.webhook/url']);
$wh
    ->setMessage('Hello world!')
    ->send();
```

For further documentation have a look here:
* [Basics](docs/01_Basics.md)
* [Sending Files](docs/02_SendingFiles.md)
* [Embeds](docs/03_Embeds.md)
