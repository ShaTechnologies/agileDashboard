<?php

namespace App\Http\Controllers\PagesControllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DeveloperPageController extends Controller
{
    
    public function showDeveloperPage()
    {
        return view('developer');//page name
    }
}
