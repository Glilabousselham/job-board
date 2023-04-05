@extends('layouts.index')
@section('content')
    <header>
        <div
            class="
    w-full 
    {{-- min-h-[400px] --}}
    py-[70px]
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
            <form action="" method="get" autocomplete="off">
                <div class="mx-auto flex-col md:flex-row bg-purple-500 gap-[1px] flex rounded-md overflow-hidden">
                    <x-input-search />
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
    </header>
    <div class="
    text-gray-700
            grid
            grid-cols-1
            md:grid-cols-4
            ">

        {{-- filter side  --}}
        <div class="col-span-1 hidden md:block">
            <h3 class="text-lg mb-3 ">Categories</h3>
            <ul class="flex flex-col text-sm gap-[1px]">
                @foreach ($categories as $category)
                    <a href="/jobs?category={{ $category->id }}">
                        <li
                            class="px-2 py-2 border-b-2 hover:bg-slate-200 hover:text-gray-900 cursor-pointer 
                        {{ (request()->category ?? '') == $category->id ? 'bg-purple-400 text-white' : null }}
                        ">
                            {{ $category->name }}
                        </li>
                    </a>
                @endforeach
            </ul>
        </div>

        <div class="col-span-2 p-2">
            <h3 class="text-lg mb-3 ">Jobs</h3>
            <div class="flex flex-col gap-1 ">
                @forelse ($jobs as $job)
                    <div class="bg-white p-3  ">
                        <div class="flex flex-nowrap gap-2">
                            <img src="{{ $job->company->logo_url }}" class="bg-purple-400 object-cover rounded-full"
                                style="width: 50px;height: 50px" alt="">
                            <a href="/jobs/{{ $job->id }}">
                                <div class="text-sm font-mono font-bold text-purple-600 flex items-start py-2">
                                    {{ $job->title }}
                                </div>
                            </a>
                        </div>
                        <div class="text-sm my-3 text-gray-500">{{ $job->created_at->diffForHumans() }}</div>

                        <div class="text-sm">
                            {{ strlen($job->description) > 200 ? substr($job->description, 0, 200) . '...' : $job->description }}
                        </div>
                        {{-- <div class="text-end">
                        <a href="#" class="text text-purple-500 ">more</a>
                    </div> --}}
                    </div>
                @empty
                @endforelse
            </div>
        </div>

        <div class="col-1">
            <h3 class="text-lg mb-3 ">Companies</h3>
            <ul class="p-1 flex flex-col gap-1">
                @foreach ($companies as $company)
                    <li class="hover:bg-purple-100 p-1">
                        <div class="flex flex-nowrap gap-2">
                            <img src="{{ $company->logo_url }}" class="bg-purple-400 object-cover rounded-full"
                                style="width: 50px;height: 50px" alt="">
                            <div class="text-sm font-mono font-bold text-purple-600 flex items-start py-2">
                                {{ $company->name }}
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
@endsection
