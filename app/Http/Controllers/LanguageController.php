<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * @param $locale
     *
     * @return \Illuminate\Http\RedirectResponse
     */

     public function swap($locale) {
        if (array_key_exists($locale, config('locale.languages'))) {
            session()->put('locale', $locale);
        }

        // if (array_key_exists($lang, Config::get('languages'))) {
        //     Session::put('applocale', $lang);
        // }

        return redirect()->back();
     }
}
