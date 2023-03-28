<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function home()
    {

        $categories = Category::all();
        $latestJobs = Job::orderBy('created_at', 'desc')->limit(10)->get();
        $locations = Job::select('location')->groupBy('location')->get();
        return view('pages.home', compact('latestJobs', 'categories', 'locations'));
    }

    public function jobs(Request $request)
    {
        $categories = Category::all();
        $locations = Job::select('location')->groupBy('location')->get();
        $companies = \App\Models\Company::all();

        $jobsQuery = Job::orderBy('created_at', 'desc');

        if ($request->filled("location")) {
            $jobsQuery->where('location', $request->get("location"));
        }
        if ($request->filled("category")) {
            $jobsQuery->join('job_category', 'jobs.id', '=', 'job_category.job_id')
                ->join('categories', 'categories.id', '=', 'job_category.category_id')
                ->where('categories.id', $request->get("category"))
                ->select("jobs.*");
        }
        if ($request->filled("search_query")) {
            $search_query = strtoupper($request->get("search_query"));
            $jobsQuery->where(DB::raw(("UPPER(jobs.title)")), 'like',"%$search_query%");
        }
        $jobs = $jobsQuery->limit(10)->get();

        return view('pages.jobs', compact('jobs', 'categories', 'locations', 'companies'));
    }
}