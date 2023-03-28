@extends('layouts.auth')


@section('content')
    {{--  --}}
    <!-- component -->
    <div class=" py-5 flex flex-col justify-center sm:py-12">
        <form action="/signup" method="post" class="relative py-3 sm:max-w-xl sm:mx-auto">
            @csrf
            <div
                class="absolute inset-0 bg-gradient-to-r from-purple-300 to-purple-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-7 bg-white shadow-lg sm:rounded-3xl sm:p-16">
                <div class="max-w-md min-w-[300px] mx-auto">
                    <div>
                        <h1 class="text-2xl font-semibold">SignUp Form </h1>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <div class="relative">
                                <input autocomplete="off" id="name" name="name" type="text"
                                    class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                                    placeholder="full name" value="{{ old('name') ?? '' }}" />
                                <label for="name"
                                    class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">full
                                    name
                                </label>
                                @error('name')
                                    <p class="text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="relative">
                                <input autocomplete="off" id="email" name="email" type="text"
                                    class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                                    placeholder="email" value="{{ old('email') ?? '' }}" />
                                <label for="email"
                                    class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Email
                                </label>
                                @error('email')
                                    <p class="text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="relative">
                                <input autocomplete="off" id="password" name="password" type="password"
                                    class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                                    placeholder="Password" value="{{ old('password') ?? '' }}" />
                                <label for="password"
                                    class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                                    Password
                                </label>
                                @error('password')
                                    <p class="text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="relative">
                                <input autocomplete="off" id="confirm_password" name="password_confirmation" type="password"
                                    class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"
                                    placeholder="confirm_password" value="{{ old('password') ?? '' }}" />
                                <label for="confirm_password"
                                    class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Confirm
                                    Password
                                </label>
                                @error('password')
                                    <p class="text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="relative">
                                <button class="bg-purple-500 text-white rounded-md px-2 py-1">SignUp</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{--  --}}
@endsection
