<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')

</head>

<body>
    <div class="min-h-screen bg-gray-100 ">
        <div class="flex justify-center bg-white">
            <a href="/">
                <div class="text-2xl font-semibold font-mono m-4 text-purple-600">Job Board</div>
            </a>
        </div>
        <div class="">
            @yield('content')
        </div>
    </div>
</body>

</html>
