<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>@yield("title", "Workopia")</title>
</head>
<body class="bg-gray-100">
    
    <x-header />

    @if (request()->is("/"))
        <x-hero />
        <x-top-banner />
    @endif

    <main class="container mx-auto mt-4">

        @if (session('success'))
            <x-alert type="success" message="{{session('success')}}" />
        @endif

        @if (session('error'))
            <x-alert type="error" message="{{session('error')}}" />
        @endif

        @yield("content")
    </main>
</body>
</html>