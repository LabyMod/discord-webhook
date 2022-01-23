# Discord Webhook
[![Latest Stable Version](https://poser.pugx.org/labymod/discord-webhook/v)](https://packagist.org/packages/labymod/discord-webhook)
[![Latest Unstable Version](https://poser.pugx.org/labymod/discord-webhook/v/unstable)](https://packagist.org/packages/labymod/discord-webhook)
[![Total Downloads](https://poser.pugx.org/labymod/discord-webhook/downloads)](https://packagist.org/packages/labymod/discord-webhook)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/LabyMod/discord-webhook/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/LabyMod/discord-webhook/?branch=master)
[![License](https://poser.pugx.org/labymod/discord-webhook/license)](https://packagist.org/packages/labymod/discord-webhook)

Send Discord messages directly from your PHP application. Even with embeds & files!

## Versions & Compatibility

| Release | Supported PHP Versions | Supported Symfony Versions   | Release Date | Maintained | Branch |
|---------|------------------------|------------------------------|--------------|------------|--------|
| 3.x     | `^8.1`                 | `^4.4.35`, `^5.3.12`, `^6.0` | ???          | Yes        | master |
| 2.x     | `^8.0`                 | `^4.4.35`, `^5.3.12`, `^6.0` | 23.01.2022   | Yes        | 2.x    |
| 1.x     | `^7.3`, `^8.0`         | `^3.0`, `^4.0`, `^5.0`       | 05.01.2020   | No         | 1.x    |

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
