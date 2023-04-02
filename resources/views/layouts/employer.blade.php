<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employer Space</title>
    @vite('resources/css/app.css')

</head>

<body>
    <div class="
        grid 
        md:grid-cols-5
        h-screen 
    ">
        <div>
            <x-sidebar />
        </div>
        <div class="md:col-span-4 h-screen flex flex-col">
            <div class="flex justify-between p-2">
                <div class="text-md font-semibold text-gray-700">
                    @yield('page-title')
                </div>
            </div>
            <div class="bg-gray-100 rounded p-2 h-full shadow-sm overflow-y-auto">
                <x-alert />
                @yield('page-content')
            </div>
        </div>
    </div>
</body>

</html>
