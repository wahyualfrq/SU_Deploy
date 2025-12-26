<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sumsel United Admin' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/6c54df6d8e.js" crossorigin="anonymous"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
</head>

<body class="min-h-screen flex flex-col bg-gray-50 text-gray-800">

    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')

    <main class="flex-1 p-6 pt-24 lg:ml-64">
        {{ $slot }}
    </main>

    @livewireScripts
</body>


</html>