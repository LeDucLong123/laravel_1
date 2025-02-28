<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
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
        // Thay đổi URL gốc cho các route
        URL::forceRootUrl('https://redesigned-space-bassoon-6957wqp954g35wv-8000.app.github.dev');

        // Nếu muốn ép buộc sử dụng HTTPS cho toàn bộ ứng dụng
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }

        // Request::setTrustedProxies(
        //     [$this->app->request->getClientIp()], 
        //     Request::HEADER_X_FORWARDED_PROTO
        // );
    }
}
