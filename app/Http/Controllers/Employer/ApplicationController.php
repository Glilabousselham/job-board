<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{

    public function index(Request $request)
    {
        $applications = $request->user()->companiesApplications()
            ->with('user')
            ->with('job.company')
            ->latest()
            ->get();
        // return $applications;
        return view('pages.employer.application.index', compact('applications'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Request $request,$id)
    {
        $application = $request->user()->companiesApplications()
            ->with('user')
            ->with('job.company')
            ->where('applications.id',$id)
            ->latest()
            ->first();
        return view('pages.employer.application.show', compact('application'));
    }


    public function edit()
    {
        //
    }


    public function update(Request $request, Application $application)
    {
        //
    }


    public function destroy(Application $application)
    {
        //
    }
}