<!doctype html>
<html lang="en">
<head >
    <title>Pixel Positions</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/js/app.js')
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#060607] text-white mb-20">
        <div class="px-10">
                <nav class="flex justify-between py-4  items-center border-b border-white/25">
                    <div>
                        <a href="/">
                            <img src="{{Vite::asset('resources/images/logo.svg')}}" alt=""> </a>
                    </div>
                    <div class="space-x-5 font-semibold">
                        <a href="#">Jobs</a>
                        <a href="#">Careers</a>
                        <a href="#">Salaries</a>
                        <a href="#">Companies</a>
                    </div>
                    <div class="space-x-5 font-semibold flex ">
                        @auth()
                            <a href="/job/create">Post a job</a>
                            <form method="post" action="logout">
                                @csrf
                                <button>Log out</button>
                            </form>
                        @else
                            <a href="/register">Sign up</a>
                            <a href="/login">Log in</a>
                        @endauth


                    </div>

                </nav>

        <main class="mt-10 max-w-[986px] mx-auto">
            {{$slot}}
        </main>
        </div>
</body>
</html>
