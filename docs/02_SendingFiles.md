# Sending Files
This library also allowes you to send files to your Discord channel.
Here we make usage of the File-Interface which comes with PHP Native (`SplFileInfo`)

More information: http://php.net/manual/de/class.splfileinfo.php 

###### Example
```php
use DiscordWebhook\Webhook;
use \SplFileInfo;

$file = new SplFileInfo('path/to/my_file.pdf');

$wh = new Webhook('https://my.webhook/url');
$wh
    ->setMessage('Here\'s my cool file:') // optional text which is sent with the file
    ->setFile($file)
    ->send();
```
