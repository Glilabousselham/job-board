@extends('layouts.index')
@section('content')
    <div
        class="
    w-full 
    {{-- min-h-[400px] --}}
    py-[200px]
    px-2
    bg-white
    flex 
    flex-col 
    items-center 
    gap-[50px]
    antialiased
    bg-gradient-to-r
    from-purple-300
    via-purple-200
    to-purple-100
">
        <div>
            <div class="text-2xl font-bold  block text-gray-700">Search Between More Then
                <span class="text-purple-500">50,000</span> Open Jobs.
            </div>
        </div>
        {{-- search start --}}
        <form action="jobs" method="get">
            <div class="mx-auto flex-col md:flex-row bg-purple-500 gap-[1px] flex rounded-md overflow-hidden">
                <input value="{{ request()->search_query ?? '' }}" name="search_query" class="outline-none px-2 max-w-[200px]"
                    type="text" placeholder="Enter keyword...">
                <select class="outline-none px-2  max-w-[200px]" name="category">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ (request()->category ?? '') == $category->id ? 'selected' : null }}>
                            {{ $category->name }}</option>
                    @endforeach

                </select>
                <select class="outline-none px-2 overflow-hidden max-w-[200px]" name="location">
                    <option value="">Select Location</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->location }}"
                            {{ (request()->location ?? '') == $location->location ? 'selected' : null }}>
                            {{ $location->location }}</option>
                    @endforeach
                </select>
                <button class="bg-purple-500 hover:bg-purple-400  text-white px-2 py-2 ">Find Jobs</button>
            </div>
        </form>
        {{-- search ends --}}
    </div>
    {{-- hero ends --}}

    {{-- latests jobs starts --}}
    <div class="py-3">
        <div class="text-center py-4">
            <h2 class="text-xl font-bold font-mono  text-gray-600">
                Latest jobs
            </h2>
        </div>
        <div
            class="
            w-full 
            grid 
            gap-1
            grid-cols-1 
            sm:grid-cols-2 
            md:grid-cols-3 
            lg:grid-cols-4 
            ">
            @foreach ($latestJobs as $job)
                <div class="bg-white p-3">
                    <div class="flex flex-nowrap gap-2">
                        <img src="{{ $job->company->logo_url }}" class="bg-purple-400 object-cover rounded-full"
                            style="width: 50px;height: 50px" alt="">
                        <div class="text-sm font-mono font-bold text-purple-600 flex items-start py-2">
                            {{ $job->title }}
                        </div>
                    </div>

                    <div class="text-sm">
                        {{ strlen($job->description) > 100 ? substr($job->description, 0, 100) . '...' : $job->description }}
                    </div>
                    <div class="text-end">
                        <a href="#" class="text text-purple-500 ">more</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- categories start --}}
    <div class="py-3">
        <div class="text-center py-4">
            <h2 class="text-xl font-bold font-mono  text-gray-600">
                Categories
            </h2>
        </div>
        <div class="flex flex-wrap gap-3">

            @foreach ($categories as $category)
                <div class="bg-purple-500 hover:bg-purple-400 cursor-pointer px-4 text-white py-2 rounded-full">
                    {{ $category->name }}
                </div>
            @endforeach
        </div>
    </div>

    {{-- categories end --}}
@endsection
