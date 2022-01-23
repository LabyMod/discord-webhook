# Changelog

## 3.0.0
* FEATURE: Enums
  * `EmbedColor` was replaced by an enum of same name
* BC BREAKS
  * Dropped compatibility/suppport for PHP 8.0


## 2.0.0
* FEATURE: PHP 8.1 ready
  * Added proper type annotations
  * Removed php annotations
* BC BREAKS
  * Drop support for PHP 7.4
* DEPRECATIONS
  * All `Embed::COLOR_*` constants (will be removed in 3.0); use `\DicordWebhook\EmbedColor::XY` now.

### 1.0.6
* Changed `guzzlehttp/guzzle` version bound to be backwards compatible.

### 1.0.5
* BUG: Fixed wrong usage of `DateTime` generation. Now `DateTimeInterface` is used.

### 1.0.4
* PHP 8.0 ready

### 1.0.3
* BUG/Improvement: Allow usage of Symfony versions ^3.0|^4.0|^5.0

### 1.0.2
* BUG: Fixed version binding of Symfony packages

### 1.0.1
* BUG: Use feature releases of guzzlehttp/guzzle

### 1.0.0
* FEATURE: Final embed support
* HTTP client implementation
* Production-ready

### 0.2.0
* FEATURE: Embed support
    * `DiscordWebhook\Webhook::addEmbed(Embed $embed)`
    * `DiscordWebhook\Embed`
    * `DiscordWebhook\Embed\Author`
    * `DiscordWebhook\Embed\Field`
    * `DiscordWebhook\Embed\Footer`
    * `DiscordWebhook\Embed\Image`
    * `DiscordWebhook\Embed\Provider`
    * `DiscordWebhook\Embed\Thumbnail`
    * `DiscordWebhook\Embed\Video`
* FEATURE: Multi-domain support
    

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
