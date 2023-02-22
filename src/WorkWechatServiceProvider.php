<?php

namespace Trigold\WechatBot;

use Illuminate\Support\ServiceProvider;

class WorkWechatServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->setupConfig();

        $this->app->singleton('work-wechat-bot', function () {
            return new WechatManager($this->app);
        });
    }

    /**
     * set up the config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $source = realpath($raw = __DIR__.'/../../config/work-wechat-bot.php') ?: $raw;
        if ($this->app->runningInConsole()) {
            $this->publishes([
                $source => config_path('work-wechat-bot.php'),
            ], 'work-wechat-bot');
        }
        $this->mergeConfigFrom($source, 'work-wechat-bot');
    }
}
