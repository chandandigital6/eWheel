<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E_Wheels</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- icons --}}
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"
/>
</head>
<body class="bg-white">
    @include('components.header')

    <div class="mx-0">
        @yield('content')
    </div>

    @include('components.footer')    

</body>
</html>