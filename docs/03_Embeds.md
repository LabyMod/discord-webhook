# Embeds

`DiscordWebhook\Embed::class` is the base class for creating an embed.
A message can contain [up to 10 embeds](https://discordapp.com/developers/docs/resources/webhook#execute-webhook).

Every embed can contain different components.
For every component there is a class which can be used to construct the embed according to your thoughts.

## Elements
All properties are `private`. Use their getters and setters to access them.

* `DiscordWebhook\Embed::class` (base class)
    * `DiscordWebhook\Embed\Author::class`
    * `DiscordWebhook\Embed\Field::class`
    * `DiscordWebhook\Embed\Footer::class`
    * `DiscordWebhook\Embed\Image::class`
    * `DiscordWebhook\Embed\Provider::class`
    * `DiscordWebhook\Embed\Thumbnail::class`
    * `DiscordWebhook\Embed\Video::class`

## Simple example
```php
<?php
declare(strict_types=1);

$wh = new \DiscordWebhook\Webhook(['https://webhook.url']);
$embed = new \DiscordWebhook\Embed();

$embed
    ->setTitle('My embed')
    ->setTimestamp(new DateTime('now'));

$wh
    ->setUsername('My bot')
    ->addEmbed($embed)
    ->send();
```

Result:<br>
![Webhook image](http://img.scrummer.de/210801050120-43792.png)
