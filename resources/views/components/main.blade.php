@props(['title' => 'Setra Logistik'])

<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>{{ $title }}</title>
</head>

<body class="px-20 pt-5">
    {{-- Navbar --}}
    <div>
        <x-Navbar />
    </div>

    {{-- Table --}}
    <div class="px-5 w-ful h-full">
        <div class="overflow-x-auto w-full h-full">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
