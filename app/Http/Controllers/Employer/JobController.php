<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{

    public function index(Request $request)
    {

        return view('pages.employer.job.index', [
            'jobs' => $request->user()->companiesJobs()->latest()->get()
        ]);
    }


    public function create()
    {
        return view('pages.employer.job.create', [
            'companies' => request()->user()->companies()->latest()->get(),
            'categories' => Category::select(['name', 'id'])->get(),
        ]);

    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|min:3|max:40',
            'location' => 'required|string|min:3|max:255',
            'salary' => 'required|numeric|min:10|max:1000000',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'company_id' => 'required|exists:companies,id',
            'description' => 'required|string|min:3|max:500',
        ]);


        DB::beginTransaction();
        $job = Job::create($data);
        $job->categories()->sync($data['categories']);
        DB::commit();
        unset($data['categories']);
        return redirect()->route('jobs.index')->with('success', "job created successfully!");
    }


    public function show(Job $job)
    {
        return view('pages.employer.job.show', compact('job'));
    }


    public function edit(Job $job)
    {
        $companies = request()->user()->companies()->latest()->get();
        $categories = Category::select(['name', 'id'])->get();
        return view('pages.employer.job.edit', compact('job', 'companies', 'categories'));
    }


    public function update(Request $request, Job $job)
    {

        $data = $request->validate([
            'title' => 'required|string|min:3|max:40',
            'location' => 'required|string|min:3|max:255',
            'salary' => 'required|numeric|min:10|max:1000000',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'company_id' => 'required|exists:companies,id',
            'description' => 'required|string|min:3|max:500',
        ]);



        DB::beginTransaction();
        $job->categories()->sync($data['categories']);
        unset($data['categories']);
        $job->update($data);
        DB::commit();
        return redirect()->route('jobs.index')->with('success', "job updated successfully!");

    }


    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', "job deleted successfully!");
    }
}