<?php

namespace App\Http\Controllers\PagesControllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectAccountantPageController extends Controller
{
    public function showProjectAccountantPage()
    {
        //comment
        return view('Project Accountant');
    }
}