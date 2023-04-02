@extends('layouts.employer')

@section('page-title')
    Jobs
@endsection

@section('page-content')
    <div>



        <div class="flex text-sm  text-gray-600 font-mono font-semibold pb-2">
            <a class="bg-white rounded-full px-3 py-1 shadow-sm hover:shadow" href="{{ route('jobs.create') }}">New Job</a>
        </div>
        <div class="p-2 bg-white overflow-x-auto">

            {{-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg"> --}}
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Company Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Salary
                        </th>
                        
                        <th scope="col" class="px-6 py-3">
                            categories
                        </th>
                        <th scope="col" class="px-6 py-3">
                            created at
                        </th>
                        <th scope="col" class="px-6 py-3">
                            actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jobs as $job)
                        <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $job->id }}
                            </th>
                            <td class="px-6 py-4">
                                 {{$job->company->name }}
                                   
                            </td>
                            <td class="px-6 py-4">
                                {{ $job->title }}

                            </td>
                            <td class="px-6 py-4 text-purple-500">
                                {{ $job->salary }}DH

                            </td>
                           
                            <td class="px-6 py-4 ">
                                <ul>
                                    @foreach ($job->categories as $cat)
                                        <li class="whitespace-nowrap">- {{$cat->name}}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="px-6 py-4 ">
                                {{ $job->created_at->format('Y-m-d') }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-1">
                                    <a href="{{ route('jobs.edit', $job->id) }}">
                                        <x-button.edit bg='green' text="white" value="edit" />
                                    </a>
                                    <a href="{{ route('jobs.show', $job->id) }}">
                                        <x-button.show bg='blue' text="white" value="show" />
                                    </a>
                                    <form onsubmit="return confirm('confirm deleting this record')"
                                        action="{{ route('jobs.destroy', $job->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <x-button.delete bg='red' text="white" value="remove" />
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                no Jobs
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- </div> --}}

        </div>
    </div>
@endsection
