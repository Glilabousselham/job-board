<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployerController extends Controller
{
    //

    public function dashboard()
    {
        return view('pages.employer.dashboard');
    }
}