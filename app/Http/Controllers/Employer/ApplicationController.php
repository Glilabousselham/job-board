<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{

    public function index(Request $request)
    {
        $status = $request->status;

        if (!in_array($status, ['rejected', 'hired']))
            $status = ["applied", 'reviewed'];

        $applications = $request->user()->companiesApplications()
            ->whereIn('status', is_array($status) ? $status : [$status])
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


    public function show(Request $request, $id)
    {
        $application = $request->user()->companiesApplications()
            ->with('user')
            ->with('job.company')
            ->where('applications.id', $id)
            ->latest()
            ->first();
        if ($application->status = "applied") {
            $application->status = "reviewed";
            $application->save();
        }
        return view('pages.employer.application.show', compact('application'));
    }


    public function edit()
    {

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:hired,rejected'
        ]);
        $application = $request->user()->companiesApplications()
            ->with('user')
            ->with('job.company')
            ->where('applications.id', $id)
            ->latest()
            ->first();

        $application->status = $request->status;
        $application->save();



        return redirect()->route("applications.index", ['status' => $request->status]);
    }


    public function destroy(Application $application)
    {
        //
    }
}