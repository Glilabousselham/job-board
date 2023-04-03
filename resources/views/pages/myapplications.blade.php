@extends('layouts.index')

@section('content')
    <div class="p-2 bg-white overflow-x-auto flex items-center flex-col">
        <div class="text-md font-semibold text-gray-700">My Applications</div>
        <p class="text-sm">here is all your jobs applications that you did</p>
    </div>
    <div class="p-2 bg-white overflow-x-auto">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Job
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cover Letter
                        </th>
                        <th scope="col" class="px-6 py-3">
                            applied At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            resume
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($applications as $app)
                        <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $app->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $app->job->title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $app->status }}

                            </td>
                            <td class="px-6 py-4 truncate max-w-[250px]">
                                {{ $app->cover_letter }}

                            </td>
                            <td class="px-6 py-4">

                                {{ $app->created_at->format('Y-m-d') }}


                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ $app->resume_url }}"
                                    class="bg-purple-200 hover:bg-purple-300 px-2 rounded text-gray-700"
                                    {{-- download="job-board-resume" --}} target="_blank">show</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
