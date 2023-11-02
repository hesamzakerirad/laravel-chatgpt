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
        
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');

        // Publish the config file to control ChatGpt.
        $this->publishes([
            __DIR__ . '/../config/chatgpt.php' => config_path('chatgpt.php')
        ], 'chatgpt-config');

        // Binding the main class to the application
        $this->app->singleton('chatgpt', function() {
            return new ChatGpt($this->app['config']->get('chatgpt.api_key'));
        });
    }
}
