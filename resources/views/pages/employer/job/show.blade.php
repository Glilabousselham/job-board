@extends('layouts.employer')

@section('page-title')
    Job Information
@endsection

@section('page-content')
    <div class="bg-white p-3 flex flex-col gap-3 max-w-[500px] my-2 mx-auto shadow-sm rounded">
        <div>
            <div class="text-lg font-semibold text-gray-600 uppercase">Job Information</div>
        </div>
        <div class="text-sm">
            <div class=" font-semibold text-gray-700">Title:</div>
            <div class=" ml-2  text-gray-600">{{ $job->title }}</div>
        </div>
        <div class="text-sm">
            <div class=" font-semibold text-gray-700">Company Name:</div>
            <a href="{{ route('companies.show', $job->company_id) }}"
                class=" ml-2 underline cursor-pointer hover:text-purple-400 text-purple-600">{{ $job->company->name }}</a>
        </div>

        <div class="text-sm">
            <div class=" font-semibold text-gray-700">Created at:</div>
            <div class=" ml-2  text-gray-600">{{ $job->created_at->format('Y-m-d') }}</div>
        </div>
        <div class="text-sm">
            <div class=" font-semibold text-gray-700">Number of Applications:</div>
            <div class=" ml-2  text-gray-600">{{ $job->applications()->count() }}</div>
        </div>
        <div class="text-sm">
            <div class=" font-semibold text-gray-700">Categories:</div>
            <div class=" ml-2  text-gray-600 flex flex-col">
                @foreach ($job->categories as $cat)
                    <span>- {{ $cat->name }}</span>
                @endforeach
            </div>
        </div>

        <div class="text-sm">
            <div class=" font-semibold text-gray-700">Location:</div>
            <div class=" ml-2  text-gray-600">{{ $job->location }}</div>
        </div>
        <div class="text-sm">
            <div class=" font-semibold text-gray-700">Description:</div>
            <div class=" ml-2  text-gray-600">{{ $job->description }}</div>
        </div>
    </div>
@endsection
