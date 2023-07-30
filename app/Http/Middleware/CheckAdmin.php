<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra xem người dùng có quyền là admin hay không
        // Ở đây, bạn có thể kiểm tra thông tin người dùng hoặc role của người dùng để xác định quyền admin

        if (auth()->user()->is_admin) {
            return $next($request);
        }

        // Nếu không có quyền admin, chuyển hướng người dùng tới trang không được phép
        return redirect()->route('unauthorized');
    }
}
