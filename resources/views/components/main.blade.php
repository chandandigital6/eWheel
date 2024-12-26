<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Litho Power Battery</title>
    <link rel="icon" type="image/png" href="{{ asset('asset/img/LITHO_POWER.png') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"
/>
{{-- slider --}}
<link
  crossorigin="anonymous"
  href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.3.2/swiper-bundle.css"
  rel="stylesheet"
/>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>
<body>
    @include('components.header')

    @yield('comtent')

    @include('components.footer')
    <script
  crossorigin="anonymous"
  defer
  src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.3.2/swiper-bundle.min.js"
></script>
</body>
</html>
