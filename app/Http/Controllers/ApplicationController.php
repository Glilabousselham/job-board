<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('mauth');
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