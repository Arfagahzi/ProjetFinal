<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function Show_home_page()
    {
        return view('FrontEnd.home');

    }
}
