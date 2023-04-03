@extends('layouts.index')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-1  text-gray-700">
        {{-- job innformation start --}}
        <div class="bg-white md:col-span-2 p-3">
            <div class="flex justify-between">
                <div>
                    <div class="text-lg font-semibold">{{ $job->title }}</div>
                    <div class="text-sm mb-7 text-gray-500">{{ $job->created_at->diffForHumans() }}</div>
                </div>
                <div>
                    <a href="/jobs/{{ $job->id }}/applynow">
                        <button class="bg-purple-500 text-white px-3 py-1 rounded-full shadow-sm hover:bg-purple-600">Apply
                            Now
                        </button>
                    </a>
                </div>
            </div>
            <div class="mb-4 font-semibold ">job description</div>
            <p class="text-md">
                {{ $job->description }}
            </p>
        </div>
        {{-- job information end --}}

        {{-- company info start --}}
        <div class="md:col-span-1 p-3 bg-white flex flex-col gap-3">
            <div class="flex gap-2 items-center  ">
                <img src="{{ $job->company->logo_url }}" class="object-cover rounded-full w-[45px] h-[45px]" alt="">
                <div class="text-md font-semibold">{{ $job->company->name }}</div>
            </div>
            <div class="flex flex-col gap-3">
                @if ($job->company->website_url)
                    <a href="{{ $job->company->website_url }}" class="text-sm text-purple-800 hover:text-purple-400">visit
                        officiel website</a>
                @endif
                <p>
                    {{ $job->company->description }}
                </p>
            </div>
        </div>
        {{-- company info end --}}
    </div>
    <div class="bg-white p-3">
        <h3 class="text-md mb-3">Others</h3>
        <ul class="flex flex-col gap-1 w-fit">
            <li class="hover:bg-gray-100 px-2 py-1 text-sm hover:underline hover:text-purple-500 text-gray-600 font-semibold ">
                <a href="/jobs">find job</a>
            </li>
            <li class="hover:bg-gray-100 px-2 py-1 text-sm hover:underline hover:text-purple-500 text-gray-600 font-semibold ">
                <a href="/employer">go to employer space</a>
            </li>
        </ul>
    </div>
@endsection
