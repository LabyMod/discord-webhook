# Changelog

### 0.1.1
* Documentation in `docs/`
* This changelog

### 0.1.0
* FEATURE: Basic webhook functionality
    * `DiscordWebhook\Webhook::setUsername(string $username): Webhook`
    * `DiscordWebhook\Webhook::setAvatar(string $url): Webhook`
    * `DiscordWebhook\Webhook::setMessage(string $message): Webhook`
    * `DiscordWebhook\Webhook::setFile(SplFileInfo $file): Webhook`
    * `DiscordWebhook\Webhook::setTts(bool $tts): Webhook`
    * `DiscordWebhook\Webhook::send(): void`
* FEATURE: PHP 7.0 requirement
    * type hinting
    * return types
    * strict_type declaration
* FEATURE: Guzzle HTTP-Client implementation
