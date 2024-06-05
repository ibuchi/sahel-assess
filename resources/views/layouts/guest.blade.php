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
    <div id="app" class=" bg-no-repeat  bg-cover h-screen overflow-y-auto " style="background-image: url({{ asset('images/green-bg-2.jpg') }})" >
            {{ $slot }}
    </div>

    @vite(['resources/js/frontend.js'])
</body>


</html>
