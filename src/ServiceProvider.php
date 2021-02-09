<?php

namespace DevBDaily\LaravelMD;

use DevBDaily\LaravelMD\View\Markdown\Markdown;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Bootstrap package services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('markdown', function ($expression) {
            return "<?php echo app('markdown')->parse($expression); ?>";
        });

        $this->publishes([
            __DIR__ . "/../config/markdown.php" => config_path('markdown.php'),
        ]);
    }

    /**
     * Register package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/markdown.php', 'markdown');
        $this->app->singleton('markdown', function ($app) {
            return new Markdown(config('markdown'));
        });
    }
}
