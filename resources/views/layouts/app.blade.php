<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sahel</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full">
    <div id="app" class="h-full bg-gray-100 overflow-scroll bg-green-50">
        {{-- <div class=" py-5 flex justify-end px-20  bg-green-900 shadow-sm">
            <form action="{{ route('logout') }}" method="POST" class="mx-20">
                @csrf
                <a href="javascript:void(0)" onclick="logout(this)">logout</a>
            </form>
        </div> --}}
        <x-navbar />
        <main class="flex items-center justify-center w-full">
            {{ $slot }}
        </main>
    </div>

    {{-- <input type="hidden" id="access_token" value="{{ access_token() }}"> --}}

    @vite(['resources/js/frontend.js'])
</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script>
    function logout(e) {
        localStorage.clear();
        e.closest('form').submit();
    }
</script>

</html>
