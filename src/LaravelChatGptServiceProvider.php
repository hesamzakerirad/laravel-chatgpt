<?php

namespace HesamRad\LaravelChatGpt;

use Illuminate\Support\ServiceProvider;

class LaravelChatGptServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            //
        }

        // Publish the config file to control ChatGpt.
        $this->publishes([
            __DIR__ . '/../config/chatgpt.php' => config_path('chatgpt.php')
        ], 'chatgpt-config');
    }
}
