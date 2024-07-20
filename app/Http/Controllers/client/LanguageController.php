<?php

namespace App\Http\Controllers\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function changeLanguage()
    {
        $language = session()->get('language');
        $lang = config('app.locale');
        if ($language == 'en') {
            $lang = 'vi';
            $language = '';
        } else {
            $lang = 'en';
            $language = 'en';
        }
        session()->put('language', $language);
        return redirect()->back();
    }
}
