@extends('layouts.employer')

@section('page-title')
    Applications
@endsection

@section('page-content')
    <div>
        @php
            $tabs = [
                [
                    'name' => 'applied',
                    'status' => '',
                ],
                [
                    'name' => 'rejected',
                    'status' => 'rejected',
                ],
                [
                    'name' => 'hired',
                    'status' => 'hired',
                ],
            ];
        @endphp

        <div class="p-2 bg-white overflow-x-auto">
            <div class="flex gap-1 px-2 mb-3">
                @foreach ($tabs as $tab)
                    <a href="{{ $tab['status'] ? route('applications.index', ['status' => $tab['status']]) : route('applications.index') }}"
                        class="text-sm font-semibold text-gray-700  px-2 py-1 
                    {{ $tab['status'] == request()->status ? 'bg-purple-400 rounded-full text-white' : 'hover:underline cursor-pointer hover:text-purple-600' }}
                    ">{{ $tab['name'] }}</a>
                @endforeach
            </div>


            {{-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg"> --}}
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Applied user
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Company Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Job Name
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Applied in
                        </th>
                        <th scope="col" class="px-6 py-3">
                            actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($applications as $app)
                        <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $app->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $app->user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $app->job->company->name }}
                            </td>
                            <td class="px-6 py-4 truncate max-w-[150px]">
                                {{ $app->job->title }}

                            </td>

                            <td class="px-6 py-4 ">
                                {{ $app->created_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-1">
                                    <a href="{{ route('applications.show', $app->id) }}">
                                        <x-button.show bg='blue' text="white" value="details" />
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                no applications
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- </div> --}}

        </div>
    </div>
@endsection
