<?php

namespace DevBDaily\LaravelMD;

use DevBDaily\LaravelMD\View\Markdown\Extension\LaravelComponentExtension;
use DevBDaily\LaravelMD\View\Markdown\Markdown;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;

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

        $this->app->singleton(CommonMarkConverter::class, function ($app) {
            $environment = new Environment();

            $environment->addExtension(new LaravelComponentExtension());

            return new CommonMarkConverter([
                'allow_unsafe_links' => false,
            ], $environment);
        });

        $this->app->singleton(Markdown::class, function ($app) {
            return new Markdown($app->make(CommonMarkConverter::class));
        });
        $this->app->alias(Markdown::class, 'markdown');
    }
}
