<?php
namespace Rizhou\Anchors;

use Illuminate\Support\ServiceProvider;


class AnchorServiceProvider extends ServiceProvider
{
    /**
     * 标记着提供器是延迟加载的
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->mergeConfigFrom(
            dirname(__DIR__).'/config/anchor.php', 'anchor'
        );


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            dirname(__DIR__).'/config/anchor.php' => config_path('anchor.php'),
        ]);

    }
}
