<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App;

class LocalizationController extends Controller
{
    public function changeLanguage($lang)
    {
        Session::put('locale', $lang);
        return redirect()->back();
    }
}
