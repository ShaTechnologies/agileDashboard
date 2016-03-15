<?php

namespace App\Http\Controllers\PagesControllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectManagerPageController extends Controller
{
    public function showProductManagerPage()
    {
        return view('project manager');
    }
}
