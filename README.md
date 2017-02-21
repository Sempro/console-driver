# console-driver [![Total Downloads](https://poser.pugx.org/sempro/console-driver/downloads)](https://packagist.org/packages/sempro/console-driver)

> Laravel explicit console driver for BotMan

### Installation
Install with composer
```bash
composer require sempro/console-driver
```

Navigate to ``config/app.php`` and add the following under providers
```php
\Sempro\ConsoleDriver\Providers\ServiceProvider::class
```

Publish assets (Console chat command)
```bash
php artisan vendor:publish --force --provider="Sempro\ConsoleDriver\Providers\ServiceProvider"
```

Register command in ``app/Console/Kernel.php``
```php
protected $commands = [
    App\Console\Commands\ConsoleChat::class
];
```

### Usage
Send a message to the bot
```bash
php artisan console:chat "Your message here"
```

Send a message and log a message
```bash
php artisan console:chat "Your message here" --log
```

### License
MIT © [Sempro AS](http://www.sempro.no)