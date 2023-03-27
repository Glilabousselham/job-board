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
            <div class="mx-auto flex-col md:flex-row bg-purple-500 gap-[1px] flex rounded-md overflow-hidden">
                <input class="outline-none px-2 max-w-[200px]" type="text" placeholder="Enter keyword...">
                <select class="outline-none px-2  max-w-[200px]" name="categoy">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>
                <select class="outline-none px-2 overflow-hidden max-w-[200px]" name="location">
                    <option value="">Select Location</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->location }}">{{ $location->location }}</option>
                    @endforeach
                </select>
                <button class="bg-purple-500 hover:bg-purple-400  text-white px-2 py-2 ">Find Jobs</button>
            </div>
            {{-- search ends --}}
        </div>
        {{-- hero ends --}}
    </header>
    <div class="
    text-gray-700
            grid
            grid-cols-1
            md:grid-cols-3
            ">

        {{-- filter side  --}}
        <div class="col-span-1">
            <h3 class="text-lg ">Categories</h3>

        </div>

        <div class="col-span-2">
            <h3 class="text-lg ">jobs</h3>
        </div>

    </div>
@endsection
