@extends('layouts.employer')

@section('page-title')
    Dashboard
@endsection

@section('page-content')
    <div>
        <div class="flex gap-1 text-gray-600">
            <a href="/employer/companies/create"
                class="bg-white shadow-sm hover:shadow-md cursor-pointer px-3 py-1 text-sm font-semibold rounded-full">
                {{-- <i class="fa-solid fa-bullhorn"></i> --}}
                <span>New company</span>
            </a>
            <a href="/employer/jobs/create"
                class="bg-white shadow-sm hover:shadow-md cursor-pointer px-3 py-1 text-sm font-semibold rounded-full">
                {{-- <i class="fa-solid fa-bullhorn"></i> --}}
                <span>New job</span>
            </a>
            <a href="/employer/applications"
                class="bg-white shadow-sm hover:shadow-md cursor-pointer px-3 py-1 text-sm font-semibold rounded-full">
                {{-- <i class="fa-solid fa-bullhorn"></i> --}}
                <span>Applications</span>
            </a>
        </div>
        {{-- graphs --}}
    </div>
@endsection
