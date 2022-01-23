# Embeds

`DiscordWebhook\Embed` is the base class for creating an embed.
A message can contain [up to 10 embeds](https://discordapp.com/developers/docs/resources/webhook#execute-webhook).

Every embed can contain different components.
For every component there is a class which can be used to construct the embed according to your thoughts.

## Elements
All properties are `private`. Use their getters and setters to access them.

* `DiscordWebhook\Embed` (base class)
    * `DiscordWebhook\Embed\Author`
    * `DiscordWebhook\Embed\Field`
    * `DiscordWebhook\Embed\Footer`
    * `DiscordWebhook\Embed\Image`
    * `DiscordWebhook\Embed\Provider`
    * `DiscordWebhook\Embed\Thumbnail`
    * `DiscordWebhook\Embed\Video`
* `DiscordWebhook\EmbedColor` (base colour class; see example below)

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
![images/embed.png](images/embed.png)

## Colouring your Embed
The `DiscordWebhook\EmbedColor` enum brings a palette of predefined colours which you can use, to colorize your embeds:
```php
$embed = new \DiscordWebhook\Embed();

// Have a look at the class for a full list of available colours
$embed->setColor(\DiscordWebhook\EmbedColor::DARK_RED);
```

The colour used above will look like this:<br>
![images/colorized-embed.png](images/colorized-embed.png)
