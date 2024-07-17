<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <script src="https://cdn.tailwindcss.com"></script>
        {{-- blade-formatter-disable --}}
        <style type="text/tailwindcss">
            .btn{
                @apply rounded-md px-2 py-1 text-center text-slate-700  shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-500
            }
        </style>
        {{-- blade-formatter-enable --}}
        @yield('style')
    </head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>

    @endif
    <div>
        <h1 class="mb-4 text-2xl">
            @yield('title')
        </h1>
    </div>
    <div>
        @yield('content')
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
