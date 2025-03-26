<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

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

  

</head>

<body class="font-sans antialiased gradient">
  <x-banner />

  <div class="min-h-screen  dark:bg-gray-900">

    @livewire('navigation')

    <!-- Page Content -->
    <main class="">
      {{ $slot }}
    </main>

    <footer class="grandient pt-5 md:pt-14">
      <div class="container mx-auto px-8">
        <div class="w-full flex flex-col md:flex-row py-6">

          <div class="flex-1 mb-6 text-black">
            <a class="text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
              <!--Icon from: http://www.potlabicons.com/ -->
              <img src="{{asset('img/undraw_moonlight_ctir.svg')}}" class="w-16 my-2" alt="">
              LUNA
            </a>
          </div>

          <div class="flex-1">
            <p class="uppercase text-white font-bold md:mb-6">Redes sociales</p>
            <ul class="list-reset mb-6 flex flex-col">
              <li class="mt-2 mr-2 md:block md:mr-0">
                <a href="https://wa.me/529371227172" target="_blank" class="no-underline hover:underline text-gray-800 hover:text-white">WhatsApp</a>
              </li>
              <li class="mt-2 mr-2 md:block md:mr-0">
                <a href="https://github.com/omarsan6" target="_blank" class="no-underline hover:underline text-gray-800 hover:text-white">GitHub</a>
              </li>
              <li class="mt-2 mr-2 md:block md:mr-0">
                <a href="https://www.linkedin.com/in/omar-s%C3%A1nchez-santana/" target="_blank" class="no-underline hover:underline text-gray-800 hover:text-white">LinkedIn</a>
              </li>
            </ul>
          </div>

          <div class="flex-1">
            <p class="uppercase text-white font-bold md:mb-6">Compañia</p>
            <ul class="list-reset mb-6 flex flex-col">
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="{{route('posts.index')}}" class="no-underline hover:underline text-gray-800 hover:text-white">Blog</a>
              </li>
              
              <li class="mt-2 mr-2 md:block md:mr-0">
                <a href="https://wa.me/529371227172" target="_blank" class="no-underline hover:underline text-gray-800 hover:text-white">Contácto</a>
              </li>
              <li class="mt-2 mr-2 md:block md:mr-0">
                <a href="mailto:omarcore8@gmail.com" target="_blank" class="no-underline hover:underline text-gray-800 hover:text-white">
                  omarcore8@gmail.com
                </a>
              </li>
            </ul>
          </div>

        </div>
      </div>
      
    </footer>
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
            // navcontent.classList.remove("text-white");
            // navcontent.classList.add("text-black");
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
            // navcontent.classList.remove("text-black");
            // navcontent.classList.add("text-white");
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