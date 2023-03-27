<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job board</title>
    @vite('resources/css/app.css')
</head>

<body>


    <div class="bg-slate-100 w-full min-h-screen">
        <div class="w-full max-w-[1600px] xl:px-1 mx-auto flex flex-col gap-1">
            @include('components.nav')
            @yield('content')
            <footer>
                <div class="bg-purple-900 py-4 px-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                        <div>
                            <h4 class="text-3xl font-bold font-mono text-purple-100 mb-3">Job Board</h4>
                            <div class="rounded-3xl flex w-fit flex-nowrap overflow-hidden">
                                <input type="text" class="px-3 outline-none" placeholder="your email address">
                                <button
                                    class="bg-purple-500 hover:bg-purple-400 py-2 px-2 text-white">Subscribe</button>
                            </div>
                            {{-- socials --}}
                            <div class="flex gap-2 py-2">
                                <i
                                    class="fa-brands fa-facebook bg-purple-200 rounded-full p-2 hover:bg-purple-500 hover:text-white cursor-pointer "></i>
                                <i
                                    class="fa-brands fa-whatsapp bg-purple-200 rounded-full p-2 hover:bg-purple-500 hover:text-white cursor-pointer "></i>
                                <i
                                    class="fa-brands fa-linkedin-in bg-purple-200 rounded-full p-2 hover:bg-purple-500 hover:text-white cursor-pointer "></i>
                                <i
                                    class="fa-brands fa-twitter bg-purple-200 rounded-full p-2 hover:bg-purple-500 hover:text-white cursor-pointer "></i>
                            </div>
                        </div>
                        <div>

                        </div>
                    </div>

                </div>
                <div class="text-center py-2 bg-purple-white">
                    copyright &copy;2023
                </div>
            </footer>
        </div>
    </div>


</body>

</html>
