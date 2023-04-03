@extends('layouts.employer')

@section('page-title')
    Applications
@endsection

@section('page-content')
    <div class="">

        <div class="bg-white px-2 py-1 rounded- flex justify-end gap-1 w-full">

            <form action="{{ route('applications.update', $application->id) }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="status" value="hired">
                <x-button.primary value="hire" />
            </form>
            <form action="{{ route('applications.update', $application->id) }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="status" value="rejected">
                <x-button.primary value="reject" />
            </form>
        </div>
        <div class="">
            <div class="text-lg text-center py-2 font-semibold text-gray-600 uppercase">Application Details</div>
        </div>
        <div class="grid md:grid-cols-10 gap-1">
            <div class="md:col-span-4 bg-white p-2 rounded shadow">
                <div class="text-md font-semibold text-gray-600 w-full py-1 bg-gray-100 text-center">User Info</div>

                <div class="text-sm">
                    <img src="{{ $application->user->profile_picture_url }}"
                        class="w-[100px] h-[100px] mx-auto my-2 rounded-full" alt="">
                </div>
                <div class="text-sm">
                    <div class=" font-semibold text-gray-700">Name:</div>
                    <div class=" ml-2  text-gray-600">{{ $application->user->name }}</div>
                </div>
                <div class="text-sm">
                    <div class=" font-semibold text-gray-700">email:</div>

                    <div class=" ml-2  text-gray-600">{{ $application->user->email }}</div>
                </div>
                <div class="text-sm">
                    <div class=" font-semibold text-gray-700">Phone Number:</div>
                    <div class=" ml-2  text-gray-600">{{ $application->user->phone_number }}</div>
                </div>
                <div class="text-sm">
                    <div class=" font-semibold text-gray-700">Bio:</div>
                    <div class=" ml-2  text-gray-600">{{ $application->user->bio }}</div>
                </div>
            </div>
            <div class="md:col-span-6  bg-white p-2 rounded shadow">
                <div class="text-md font-semibold text-gray-600 w-full py-1 bg-gray-100 text-center">Application Info</div>

                <div class="text-sm">
                    <div class=" font-semibold text-gray-700">Company Name:</div>
                    <div class=" ml-2  text-gray-600">{{ $application->job->company->name }}</div>
                </div>
                <div class="text-sm">
                    <div class=" font-semibold text-gray-700">Job Title:</div>
                    <div class=" ml-2  text-gray-600">{{ $application->job->title }}</div>
                </div>
                <div class="text-sm">
                    <div class=" font-semibold text-gray-700">applied at:</div>
                    <div class=" ml-2  text-gray-600">{{ $application->created_at->format('Y-m-d') }}</div>
                </div>
                <div class="text-sm">
                    <div class=" font-semibold text-gray-700">Resume:</div>

                    <a href="{{ $application->resume_url }}"
                        target="_blank"class="text-purple-600 ml-2 hover:text-purple-500 underline text-md">show</a>
                </div>
                <div class="text-sm">
                    <div class=" font-semibold text-gray-700">Cover Letter:</div>
                    <div class=" ml-2  text-gray-600">{{ $application->cover_letter }}</div>
                </div>

            </div>
        </div>
    </div>
@endsection
