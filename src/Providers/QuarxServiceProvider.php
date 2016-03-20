<?php

namespace Yab\Quarx\Providers;

use App;
use Yab\Quarx\Services\PageService;
use Yab\Quarx\Services\BlogService;
use Yab\Quarx\Services\EventService;
use Yab\Quarx\Services\QuarxService;
use Yab\Quarx\Services\CryptoService;
use Yab\Quarx\Services\ModuleService;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class QuarxServiceProvider extends ServiceProvider
{

    /**
     * Alias the services in the boot
     *
     * @return void
     */
    public function boot()
    {
        $loader = AliasLoader::getInstance();

        $loader->alias("Quarx", \Yab\Quarx\Facades\QuarxServiceFacade::class);
        $loader->alias("PageService", \Yab\Quarx\Facades\PageServiceFacade::class);
        $loader->alias("EventService", \Yab\Quarx\Facades\EventServiceFacade::class);
        $loader->alias("CryptoService", \Yab\Quarx\Facades\CryptoServiceFacade::class);
        $loader->alias('ModuleService', \Yab\Quarx\Facades\ModuleServiceFacade::class);
        $loader->alias('BlogService', \Yab\Quarx\Facades\BlogServiceFacade::class);
        $loader->alias('FileService', \Yab\Quarx\Services\FileService::class);
    }

    /**
     * Register the services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('QuarxService', function($app) {
            return new QuarxService();
        });

        $this->app->bind('PageService', function($app) {
            return new PageService();
        });

        $this->app->bind('EventService', function($app) {
            return App::make(EventService::class);
        });

        $this->app->bind('CryptoService', function($app) {
            return new CryptoService();
        });

        $this->app->bind('ModuleService', function($app) {
            return new ModuleService();
        });

        $this->app->bind('BlogService', function($app) {
            return new BlogService();
        });
    }
}