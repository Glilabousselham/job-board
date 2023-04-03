@extends('layouts.employer')

@section('page-title')
    Companies
@endsection

@section('page-content')
    <div class="bg-white p-3 flex flex-col gap-3 max-w-[500px] my-2 mx-auto shadow-sm rounded">
        <div>
            <div class="text-lg font-semibold text-gray-600 uppercase">Company Information</div>
        </div>
        <div class="text-sm">
            <div class=" font-semibold text-gray-700">Name:</div>
            <div class=" ml-2  text-gray-600">{{ $company->name }}</div>
        </div>
        <div class="text-sm">
            <div class=" font-semibold text-gray-700">Website:</div>
            <a href="{{ route('companies.show', $company->website_url) }}"
                class=" ml-2 underline cursor-pointer hover:text-purple-400 text-purple-600">{{ $company->website_url }}</a>
        </div>
        <div class="text-sm">
            <div class=" font-semibold text-gray-700">Created at:</div>
            <div class=" ml-2  text-gray-600">{{ $company->created_at->format('Y-m-d') }}</div>
        </div>
        <div class="text-sm">
            <div class=" font-semibold text-gray-700">Number of jobs:</div>
            <div class=" ml-2  text-gray-600">{{ $company->jobs()->count() }}</div>
        </div>
        <div class="text-sm">
            <div class=" font-semibold text-gray-700">Logo:</div>
            <div class=" ml-2  text-gray-600">
                <img src="{{ $company->logo_url }}" class="rounded w-[200px] h-[200px] object-cover" alt="">
            </div>
        </div>
        <div class="text-sm">
            <div class=" font-semibold text-gray-700">Description:</div>
            <div class=" ml-2  text-gray-600">{{ $company->description }}</div>
        </div>
    </div>
@endsection
