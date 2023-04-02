@php
    
    $links = [
        [
            'uri' => 'employer/dashboard',
            'name' => 'Dashboard',
            'icon' => 'fa-solid fa-gauge',
        ],
        [
            'uri' => 'employer/companies',
            'name' => 'Companies',
            'icon' => 'fa-solid fa-building',
        ],
        [
            'uri' => 'employer/applications',
            'name' => 'Applications',
            'icon' => 'fa-solid fa-blender-phone',
        ],
        [
            'uri' => 'employer/jobs',
            'name' => 'Jobs',
            'icon' => 'fa-solid fa-bullhorn',
        ],
    ];
@endphp
<div class="py-5 px-5 h-full relative ">
    <div class="flex justify-center">
        <img width="70px" src="/assets/logo.png" alt="">
    </div>
    {{-- items --}}
    <div class=" flex flex-col gap-1 mt-10">

        @foreach ($links as $link)
            <a class="w-full py-2 px-5 flex items-center gap-3 font-semibold text-gray-600 
                {{ request()->is("{$link['uri']}*") ? 'bg-purple-200' : 'hover:bg-purple-100' }}
             rounded-full"
                href="/{{ $link['uri'] }}">
                <i class="{{ $link['icon'] }} text-md"></i>
                <span class="text-sm">
                    {{ $link['name'] }}
                </span>
            </a>
        @endforeach


    </div>
    <div class="absolute bottom-1 right-1 left-1">
        <form action="/logout" method="post" class=" w-full">
            @csrf
            <button class="px-2 py-1 hover:bg-purple-100  w-full text-left rounded-md font-semibold ">
                Logout
            </button>
        </form>
    </div>
</div>
