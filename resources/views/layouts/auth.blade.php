<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spectrematic | {{ $title }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");
    </style>

    <script src="{{ url('auth/assets/script/tailwind-config.js') }}"></script>

    <style type="text/tailwindcss">
        .flex::before,
        .flex::after {
            display: none !important;
        }
    </style>
</head>

<body class="font-poppins">
    <!-- Desktop Only -->
    <div class="mx-auto max-w-screen min-h-screen bg-black text-white md:px-10 px-3">
        <div class="fixed top-[50px] hidden lg:block py-20">
            <img src="{{ url('auth/assets/images/pict1.jpg') }}"
                class="hidden laptopLg:block laptopLg:max-w-[650px] laptopXl:max-w-[800px] rounded-lg max-w-full h-auto align-middle border-none" alt="">
        </div>
        <div class="py-10 flex laptopLg:ml-[680px] laptopXl:ml-[870px]">
            @yield('content')
        </div>
    </div>
</body>

</html>
