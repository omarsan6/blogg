<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

        <style>
            .gradient {
              background: linear-gradient(90deg, #d53369 0%, #daae51 100%);
            }
        </style>

    </head>

    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen  dark:bg-gray-900">

            @livewire('navigation')

            <!-- Page Content -->
            <main class="bg-white">
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>

    <script>
        var scrollpos = window.scrollY;
        var header = document.getElementById("header");
        var navcontent = document.getElementById("nav-content");
        var navaction = document.getElementById("navAction");
        var brandname = document.getElementById("brandname");
        var toToggle = document.querySelectorAll(".toggleColour");
  
        document.addEventListener("scroll", function () {
          /*Apply classes for slide in bar*/
          scrollpos = window.scrollY;
  
          if (scrollpos > 10) {
            header.classList.remove("gradient");
            header.classList.add("bg-white");
            navaction.classList.remove("bg-white");
            navaction.classList.add("gradient");
            navaction.classList.remove("text-gray-800");
            navaction.classList.add("text-white");
            //Use to switch toggleColour colours
            for (var i = 0; i < toToggle.length; i++) {
              toToggle[i].classList.add("text-gray-800");
              toToggle[i].classList.remove("text-white");
            }
            header.classList.add("shadow");
            navcontent.classList.remove("bg-gray-100");
            navcontent.classList.add("bg-white");
          } else {
            header.classList.remove("bg-white");
            header.classList.add("gradient");
            navaction.classList.remove("gradient");
            navaction.classList.add("bg-white");
            navaction.classList.remove("text-white");
            navaction.classList.add("text-gray-800");
            //Use to switch toggleColour colours
            for (var i = 0; i < toToggle.length; i++) {
              toToggle[i].classList.add("text-white");
              toToggle[i].classList.remove("text-gray-800");
            }
  
            header.classList.remove("shadow");
            navcontent.classList.remove("bg-white");
            navcontent.classList.add("bg-gray-100");
          }
        });
    </script>
    <script>
        /*Toggle dropdown list*/
        /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/
  
        var navMenuDiv = document.getElementById("nav-content");
        var navMenu = document.getElementById("nav-toggle");
  
        document.onclick = check;
        function check(e) {
          var target = (e && e.target) || (event && event.srcElement);
  
          //Nav Menu
          if (!checkParent(target, navMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, navMenu)) {
              // click on the link
              if (navMenuDiv.classList.contains("hidden")) {
                navMenuDiv.classList.remove("hidden");
              } else {
                navMenuDiv.classList.add("hidden");
              }
            } else {
              // click both outside link and outside menu, hide menu
              navMenuDiv.classList.add("hidden");
            }
          }
        }
        function checkParent(t, elm) {
          while (t.parentNode) {
            if (t == elm) {
              return true;
            }
            t = t.parentNode;
          }
          return false;
        }
    </script>
</html>
