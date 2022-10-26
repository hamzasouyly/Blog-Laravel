<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="style/style.css">
      <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

<link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
<link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
<script src="https://aframe.io/releases/1.2.0/aframe.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.css" integrity="sha512-TD/aL30dNLN0VaHVoh9voFlNi7ZuWQYtV4bkIJv2ulZ8mEEkZJ7IyGvDthMKvIUwzLmPONnjQlAi55HTERVXpw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        @livewireStyles
        @yield('style')

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <script src="/js/app.js" defer></script>
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
          
            <!-- Page Content -->
            <main>
                
                <div class="">
                    @include('layouts.navbar')
                    <div class="container">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.min.js" integrity="sha512-gSf3NCgs6wWEdztl1e6vUqtRP884ONnCNzCpomdoQ0xXsk06lrxJsR7jX5yM/qAGkPGsps+4bLV5IEjhOZX+gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <!-- carousel -->
    <script src="OwlCarousel2-2.3.4/dist/owl.carousel.js"></script>
    <script src="OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    @yield('script')
    </body>
</html>
