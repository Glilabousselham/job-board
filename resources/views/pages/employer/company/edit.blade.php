@extends('layouts.employer')

@section('page-title')
    Edit Company
@endsection

@section('page-content')
    <div>
        <form action="{{ route('companies.update', $company->id) }}" method="post" enctype="multipart/form-data"
            class=" max-w-[500px] w-full bg-white rounded p-5 mx-auto">
            @csrf
            @method('put')
            <h1 class="text-center text-xl text-purple-600 font-bold font-mono ">Edit Company</h1>

            <div class="flex flex-col gap-2 mt-5">
                <div class="grid md:grid-cols-4">
                    <label for="name">Name</label>
                    <div class="md:col-span-3">
                        <input type="text" id="name" name="name" value="{{ old('name') ?? $company->name }}"
                            class="w-full border text-sm outline-none px-2 py-1 rounded  border-gray-400">
                        @error('name')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid md:grid-cols-4">
                    <label for="website_url">Website</label>
                    <div class="md:col-span-3">
                        <input type="text" id="website_url" name="website_url"
                            value="{{ old('website_url') ?? $company->website_url }}"
                            class="w-full border text-sm outline-none px-2 py-1 rounded  border-gray-400">
                        @error('website_url')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid md:grid-cols-4">
                    <label for="logo">Logo</label>
                    <div class="md:col-span-3">
                        <input type="file" id="logo" name="logo"
                            class="w-full border text-sm outline-none px-2 py-1 rounded  border-gray-400">
                        @error('logo')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid md:grid-cols-4">
                    <label for="description">Description</label>
                    <div class="md:col-span-3">
                        <textarea type="text" id="description" name="description" rows="6"
                            class="w-full border text-sm outline-none px-2 py-1 rounded  border-gray-400">{{ old('description') ?? $company->description }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end gap-1">
                    <a href="{{ route('companies.index') }}">
                        <x-button.cancel value='Cancel' type="button" />
                    </a>
                    <x-button.primary value='Save Changes' />
                </div>
            </div>
        </form>
    </div>
@endsection
