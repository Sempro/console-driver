<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;

class ConsoleChat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'console:chat {message} {--log}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Talk to the bot';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // 1. Register command in app\Console\Kernel.php

        // 2. Call your BotMan controller, job or class ...
        // dispatch(new App\Jobs\BotMan);

        // PS: {message} will be received by the @class ConsoleDriver through $_SERVER['argv'][2]
    }
}
