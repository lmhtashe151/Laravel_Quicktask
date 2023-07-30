<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
class LocaleMiddleware
{
    public function handle($request, Closure $next)
    {
        // Lấy ngôn ngữ được lưu trong session (nếu có)
        $locale = Session::get('locale');

        // Nếu không có ngôn ngữ trong session, sử dụng ngôn ngữ mặc định của ứng dụng (Tiếng Anh)
        if (!$locale) {
            $locale = config('app.fallback_locale');
        }

        // Đặt ngôn ngữ cho ứng dụng
        App::setLocale($locale);

        return $next($request);
    }
}
