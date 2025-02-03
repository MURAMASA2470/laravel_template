<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
        // 存在しないカラムに値を入れようとするとエラーが起きるように
        Model::preventAccessingMissingAttributes(
            !$this->app->isProduction()
        );

        // 存在しないカラムに値をセットして保存するとエラーになるように
        Model::preventSilentlyDiscardingAttributes();
        
        // N + 1が発生したらエラーになるように
        Model::preventLazyLoading(
                !$this->app->isProduction()
        );

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
