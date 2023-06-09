<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    /**
     * @var  \Illuminate\Database\Eloquent\Collection $jobs;
     */
    private function markJobView($jobs)
    {
        $user = request()->user();
        if (!$user)
            return;
        foreach ($jobs as $job) {
            $user->jobViews()->firstOrCreate(['job_id' => $job->id]);
        }
    }


    public function __construct()
    {
        $this->middleware('mauth')->only(['applynow', 'applynowView', 'applysuccess', 'applySuccessAlert', 'myapplications']);
        $this->middleware('employer:0')->only(['applynowView', 'applynow', 'myapplications']);
    }
    public function home()
    {

        $categories = Category::all();
        $latestJobs = Job::orderBy('created_at', 'desc')->limit(10)->get();
        $locations = Job::select('location')->groupBy('location')->get();

        $this->markJobView($latestJobs);

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

            $search_query = $request->get("search_query");
            if ($request->user()) {

                $request->user()->jobSearches()->updateOrCreate([
                    'search_query' => $search_query
                ]);
            }

            $search_query = strtoupper($search_query);
            $jobsQuery->where(DB::raw(("UPPER(jobs.title)")), 'like', "%$search_query%");
        }
        $jobs = $jobsQuery->limit(10)->get();

        $this->markJobView($jobs);

        return view('pages.jobs', compact('jobs', 'categories', 'locations', 'companies'));
    }

    public function viewJob(Job $job)
    {
        return view('pages.view-job', compact('job'));
    }

    public function applynowView(Job $job)
    {
        return view('pages.apply-now', compact('job'));
    }

    public function applynow(Job $job, Request $request)
    {
        $request->validate([
            'resume' => 'required|file|mimes:doc,docx,pdf|max:10000',
            'cover_letter' => 'required|string|min:10|max:400'
        ]);

        $path = $request->file('resume')->store('public/resumes');

        if (!$path) {
            throw new \Exception("file not uploaded");
        }

        $resume_url = str_replace("public", '/storage', $path);

        $request->user()->applications()->create([
            'resume_url' => $resume_url,
            'cover_letter' => $request->cover_letter,
            'job_id' => $job->id
        ]);

        return response()->redirectTo('/alerts/applysuccess');
    }

    public function applySuccessAlert()
    {
        return view('pages.apply-success');
    }
    public function myapplications()
    {
        $applications = request()->user()->applications()->latest()->get();
        return view('pages.myapplications', compact('applications'));
    }
}