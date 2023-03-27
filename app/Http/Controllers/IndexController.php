<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {

        $categories = Category::all();
        $latestJobs = Job::orderBy('created_at', 'desc')->limit(10)->get();
        $locations = Job::select('location')->groupBy('location')->get();
        return view('pages.home', compact('latestJobs', 'categories', 'locations'));
    }

    public function jobs()
    {
        $categories = Category::all();
        $locations = Job::select('location')->groupBy('location')->get();
        $jobs = Job::orderBy('created_at', 'desc')->limit(10)->get();

        return view('pages.jobs', compact('jobs', 'categories', 'locations'));
    }
}