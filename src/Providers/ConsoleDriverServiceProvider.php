<?php
namespace Sempro\ConsoleDriver\Providers;

use Illuminate\Support\ServiceProvider;
use Mpociot\BotMan\DriverManager;
use Sempro\ConsoleDriver\Console\Commands\ConsoleChat;
use Sempro\ConsoleDriver\Drivers\ConsoleDriver;

class ConsoleDriverServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Register driver in BotMan
        if ($this->app->runningInConsole() {
            DriverManager::loadDriver(ConsoleDriver::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish assets
        $this->publishAssets();
    }

    private function publishAssets()
    {
        $this->publishes([__DIR__ . '/../../publishable' => base_path()]);
    }
}
