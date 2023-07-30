<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Session;
class LanguageController extends Controller
{
    public function changeLanguage($locale)
    {
        // Kiểm tra xem ngôn ngữ được yêu cầu có tồn tại trong danh sách ngôn ngữ hỗ trợ không
        if (in_array($locale, ['vi', 'en'])) {
            // Lưu ngôn ngữ vào session
            Session::put('locale', $locale);
        }

        // Chuyển hướng lại về trang trước đó (nếu có) hoặc trang chủ
        return redirect()->back();
    }
}
