# Basics

### API 101
* All Setters are developed fluent so you can chain them: `$webhook->setXY()->setYZ()->setEtc()`

### Webhook Configuration

After creating an instance of the webhook you're able to configure the following properties of the Bot:
* Username
* Avatar

###### Example
```php
use DiscordWebhook\Webhook;

$wh = new Webhook(['https://my.webhook/url']);
$wh
    ->setUsername('My awesome BOT 💥')
    ->setAvatar('https://url.to/the_avatar.jpg');
```

### Simple Text message
It's no rocket sience, just that simple:
```php
use DiscordWebhook\Webhook;

$wh = new Webhook(['https://my.webhook/url']);
$wh
    ->setMessage('Test-message')
    ->send();
```

### Text-To-Speech messages
If you want to send Text-To-Speech (TTS) messages just set the TTS to `true`
```php
use DiscordWebhook\Webhook;

$wh = new Webhook(['https://my.webhook/url']);
$wh->setTts(true);
```

### Multiple destinations
The constructor accepts an array. There you can pass multiple webhooks which are all executed.
This is useful when you want to send the same information to multiple Discord servers.
```php
use DiscordWebhook\Webhook;

$wh = new Webhook([
    'https://my.webhook/url',
    'https://another.webhook/url/v2',
    '...'
]);

$wh
    ->setMessage('Test-message')
    ->send();
```
