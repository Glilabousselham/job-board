{{-- turn-account-to-employer --}}
@extends('layouts.index')

@section('content')

    <form action="/profile/update" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="w-full  mx-auto gap-2 max-w-[500px] text-sm text-gray-700 font-mono">
            <div class="bg-white shadow rounded pb-5 flex flex-col gap-2 ">
                <h1 class="text-lg font-semibold text-gray-600 py-2 bg-purple-100 text-center mb-2">Edit Profile</h1>

                <div class="flex flex-col px-3">
                    <div class=" text-sm font-semibold uppercase text-gray-500">profile picture:</div>
                    <input type="file" name="profile_picture" placeholder="profile_picture"
                        value="{{ old('profile_picture') ?? $user->profile_picture }}"
                        class="outline-none border-[1.5px] px-2 py-1  text-gray-600 rounded border-gray-300">
                    @error('profile_picture')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>


                <div class="flex flex-col px-3">
                    <div class=" text-sm font-semibold uppercase text-gray-500">name:</div>
                    <input type="text" name="name" placeholder="name" value="{{ old('name') ?? $user->name }}"
                        class="outline-none border-[1.5px] px-2 py-1  text-gray-600 rounded border-gray-300">
                    @error('name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col px-3">
                    <div class=" text-sm font-semibold uppercase text-gray-500">email:</div>
                    <input type="text" name="email" placeholder="email" value="{{ old('email') ?? $user->email }}"
                        class="outline-none border-[1.5px] px-2 py-1  text-gray-600 rounded border-gray-300">
                    @error('email')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col px-3">
                    <div class=" text-sm font-semibold uppercase text-gray-500">phone_number:</div>
                    <input type="text" name="phone_number" placeholder="phone_number"
                        value="{{ old('phone_number') ?? $user->phone_number }}"
                        class="outline-none border-[1.5px] px-2 py-1  text-gray-600 rounded border-gray-300">
                    @error('phone_number')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col px-3">
                    <div class=" text-sm font-semibold uppercase text-gray-500">bio:</div>
                    <textarea type="text" name="bio" placeholder="bio" rows="7"
                        class="outline-none border-[1.5px] px-2 py-1  text-gray-600 rounded border-gray-300">{{ old('bio') ?? $user->bio }}</textarea>
                    @error('bio')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col px-3">
                    <x-button.primary value="save changes" />
                </div>

            </div>
        </div>

    </form>
@endsection
