@extends('layouts.employer')

@section('page-title')
    Companies
@endsection

@section('page-content')
    <div>



        <div class="flex text-sm  text-gray-600 font-mono font-semibold pb-2">
            <a class="bg-white rounded-full px-3 py-1 shadow-sm hover:shadow" href="{{ route('companies.create') }}">New
                Company</a>
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
                            Logo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Website
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
                    @forelse ($companies as $com)
                        <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $com->id }}
                            </th>
                            <td class="px-6 py-4">
                                <img src="{{ $com->logo_url }}" class="w-[40px] h-[40px] object-cover rounded-md"
                                    alt="">
                            </td>
                            <td class="px-6 py-4">
                                {{ $com->name }}

                            </td>
                            <td class="px-6 py-4 truncate max-w-[150px]">
                                {{ $com->description }}

                            </td>
                            <td class="px-6 py-4 max-w-[150px] truncate">
                                <a href="{{ $com->website_url }}"
                                    class="text-purple-500 hover:underline  ">{{ $com->website_url }}</a>
                            </td>
                            <td class="px-6 py-4 ">
                                {{ $com->created_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-1">
                                    <a href="{{ route('companies.edit', $com->id) }}">
                                        <x-button.edit bg='green' text="white" value="edit" />
                                    </a>
                                    <a href="{{ route('companies.show', $com->id) }}">
                                        <x-button.show bg='blue' text="white" value="show" />
                                    </a>
                                    <form onsubmit="return confirm('confirm deleting this record')"
                                        action="{{ route('companies.destroy', $com->id) }}" method="post">
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
                                no companies
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- </div> --}}

        </div>
    </div>
@endsection
