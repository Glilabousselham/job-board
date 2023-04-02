@extends('layouts.employer')

@section('page-title')
    New Job
@endsection

@section('page-content')
    <div>
        <form action="{{ route('jobs.store') }}" method="post" enctype="multipart/form-data"
            class=" max-w-[500px] w-full bg-white rounded p-5 mx-auto">
            @csrf
            <h1 class="text-center text-xl text-purple-600 font-bold font-mono ">Create Job</h1>

            <div class="flex flex-col gap-2 mt-5">
                <div class="grid md:grid-cols-4">
                    <label for="title">Title</label>
                    <div class="md:col-span-3">
                        <input type="text" id="title" name="title" value="{{ old('title') }}"
                            class="w-full border text-sm outline-none px-2 py-1 rounded  border-gray-400">
                        @error('title')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid md:grid-cols-4">
                    <label for="location">Location</label>
                    <div class="md:col-span-3">
                        <input type="text" id="location" name="location" value="{{ old('location') }}"
                            class="w-full border text-sm outline-none px-2 py-1 rounded  border-gray-400">
                        @error('location')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="grid md:grid-cols-4">
                    <label for="salary">Salary</label>
                    <div class="md:col-span-3">
                        <input type="text" id="salary" name="salary" value="{{ old('salary') }}"
                            class="w-full border text-sm outline-none px-2 py-1 rounded  border-gray-400">
                        @error('salary')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid md:grid-cols-4">
                    <label for="categories">Categories</label>
                    <div class="md:col-span-3">
                        <select name="categories[]" id="categories" multiple
                            class="w-full border text-sm outline-none px-2 py-1 rounded  border-gray-400">

                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ in_array($cat->id, old('categories')??[]) ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('categories')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid md:grid-cols-4">
                    <label for="company_id">Company</label>
                    <div class="md:col-span-3">


                        <select name="company_id" id="company_id"
                            class="w-full border text-sm outline-none px-2 py-1 rounded  border-gray-400">
                            <option value="">select company</option>
                            @foreach ($companies as $com)
                                <option value="{{ $com->id }}" {{ old('company_id') == $com->id ? 'selected' : '' }}>
                                    {{ $com->name }}</option>
                            @endforeach
                        </select>

                        @error('company_id')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>



                <div class="grid md:grid-cols-4">
                    <label for="description">Description</label>
                    <div class="md:col-span-3">
                        <textarea type="text" id="description" name="description" rows="6"
                            class="w-full border text-sm outline-none px-2 py-1 rounded  border-gray-400">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end gap-1">
                    <a href="{{ route('jobs.index') }}">
                        <x-button.cancel value="Cancel" type="button" />
                    </a>
                    <x-button.primary value="Create" />
                </div>
            </div>
        </form>
    </div>
@endsection
