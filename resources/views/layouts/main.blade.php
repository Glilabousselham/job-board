<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Board</title>
    @vite('resources/css/app.css')
</head>
<body>
    <header>
        <nav class="flex  justify-between">
            <div class="logo"><span>Job</span><span>Board
                </span></div>

                <ul class="flex justify-end gap-2">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <a href="/jobs">Jobs</a>
                    </li>
                    <li>
                        <a href="/login">login</a>
                    </li>
                </ul>
        </nav>
    </header>
    <main>
        @yield('main')
    </main>
    <footer>

    </footer>
</body>
</html>