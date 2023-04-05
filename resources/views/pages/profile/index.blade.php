{{-- turn-account-to-employer --}}
@extends('layouts.index')

@section('content')
    <x-alert />
    <div class="grid md:grid-cols-3 w-full  mx-auto gap-2 max-w-[700px] text-sm text-gray-700 font-mono">
        <div class="md:col-span-2 ">
            <div class="bg-white shadow rounded pb-5 flex flex-col gap-2 ">
                <h1 class="text-lg font-semibold text-gray-600 py-2 bg-purple-100 text-center mb-2">Profile</h1>
                <div class="text-end px-3">
                    <a href="/profile/edit"
                        class="text-purple-800 bg-purple-200 hover:bg-purple-600 hover:text-white py-1 px-2 rounded shadow-sm">Edit
                        Profile</a>
                </div>
                <div class="flex flex-col items-center gap-3 px-3">
                    <img src="{{ $user->profile_picture_url }}" class="h-[130px] w-[130px] rounded-full bg-gray-500"
                        alt="">
                    <div class="text-gray-700 text-lg font-semibold">{{ $user->name }}</div>

                </div>
                <div class="flex flex-wrap px-3">
                    <div class="uppercase text-md font-semibold">Account Type:</div>
                    <div class="px-1 text-green-700">{{ $user->is_employer ? 'employer' : 'client' }}</div>
                </div>
                <div class="flex flex-wrap px-3">
                    <div class=" text-md font-semibold">EMAIL:</div>
                    <p class="px-1 text-gray-700 text-sm">{{ $user->email }}</p>
                </div>
                <div class="flex flex-wrap px-3">
                    <div class=" text-md font-semibold uppercase">phone number:</div>
                    <p class="px-1 text-gray-700 text-sm">{{ $user->phone_number }}</p>
                </div>
                <div class="flex flex-wrap px-3">
                    <div class="text-gray-600 text-md font-semibold">BIO:</div>
                    <p class="px-1 text-gray-700 text-sm">{{ $user->bio }}</p>
                </div>
            </div>
        </div>
        <div class="md:col-span-1 ">
            <div class="bg-white px-3 py-5 flex flex-col gap-2">

                <div class="flex flex-col gap-2">
                    @if (!request()->user()->is_employer)
                        <a href="/profile?modal=employer" class="text-purple-600 hover:text-purple-500 hover:underline">do
                            you
                            want
                            to
                            get employer account?</a>
                    @endif
                    <a href="/profile?modal=password" class="text-purple-600 hover:text-purple-500 hover:underline">change
                        password</a>
                </div>
            </div>
        </div>
    </div>


    @if (request()->get('modal') === 'password')
        {{-- modal to change password start --}}
        {{-- container --}}
        <div class="fixed w-full h-screen bg-[#50505088] flex items-center justify-center">
            {{-- modal --}}
            <div class="min-w-[250px] bg-white rounded shadow p-2 text-sm text-gray-600">
                {{-- modal header --}}
                <div class="border-b  font-bold mb-2 py-1">
                    change password
                </div>
                <form action="/profile/changepassword" method="post">
                    @csrf
                    @method('put')
                    <div class="flex flex-col gap-2">
                        <input type="password" name="oldpass" placeholder="old password"
                            class="p-1 w-full border-[1.5px] rounded">
                        @error('oldpass')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                        <input type="password" name="newpass" placeholder="new password"
                            class="p-1 w-full border-[1.5px] rounded">
                        @error('newpass')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                        <input type="submit" value="change" role="button"
                            class="p-1 w-full border-[1.5px] rounded shadow-sm hover:bg-purple-700 hover:text-white hover:border-white">
                    </div>
                </form>
            </div>
        </div>
        {{-- modal to change password end --}}
    @elseif(request()->get('modal') === 'employer')
        {{-- modal to change password start --}}
        {{-- container --}}
        <div class="fixed w-full h-screen bg-[#50505088] flex items-center justify-center">
            {{-- modal --}}
            <div class="min-w-[250px] max-w-[450px] bg-white rounded shadow p-2 text-sm text-gray-600">
                {{-- modal header --}}
                <div class="border-b  font-bold mb-2 py-1">
                    Confirm action
                </div>
                <form action="/profile/converttoemployer" method="post">
                    @csrf
                    @method('put')

                    <p class="break-words pb-3 pt-1">
                        are you sure you want to convert your account into employer account,
                        after converting your account into employer account you will not be able to apply for jobs.
                        do you want to continue?
                    </p>
                    <div class="flex gap-1">
                        <a href="/profile"
                            class="p-1 w-full border-[1.5px] rounded shadow-sm text-center hover:bg-red-400 hover:text-white hover:border-white">cancel</a>
                        <input type="submit" value="change" role="button"
                            class="p-1 w-full border-[1.5px] rounded shadow-sm hover:bg-purple-700 hover:text-white hover:border-white">
                    </div>
            </div>
            </form>
        </div>
        </div>
        {{-- modal to change password end --}}
    @endif
@endsection
