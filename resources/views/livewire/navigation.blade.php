<div class="">

  <nav id="header" class="fixed w-full z-30 top-0 text-white gradient py-2">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0">
      <div class="pl-4 flex items-center">
        <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="/">
          <!--Icon from: http://www.potlabicons.com/ -->
          <svg class="h-8 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.005 512.005">
            <rect fill="#2a2a31" x="16.539" y="425.626" width="479.767" height="50.502"
              transform="matrix(1,0,0,1,0,0)" />
            <path class="plane-take-off"
              d=" M 510.7 189.151 C 505.271 168.95 484.565 156.956 464.365 162.385 L 330.156 198.367 L 155.924 35.878 L 107.19 49.008 L 211.729 230.183 L 86.232 263.767 L 36.614 224.754 L 0 234.603 L 45.957 314.27 L 65.274 347.727 L 105.802 336.869 L 240.011 300.886 L 349.726 271.469 L 483.935 235.486 C 504.134 230.057 516.129 209.352 510.7 189.151 Z " />
          </svg>
          LUNA
        </a>
      </div>
      <div class="block lg:hidden pr-4">
        <button id="nav-toggle"
          class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
          <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
          </svg>
        </button>
      </div>
      <div
        class="w-full flex-grow h-full lg:flex lg:items-center lg:w-auto hidden p-4 mt-2 lg:mt-0 gradient lg:bg-transparent text-black lg:p-0 z-20"
        id="nav-content">
        <ul class="list-reset lg:flex justify-end flex-1 items-center">
          <li class="mr-3">
            <a class="inline-block py-2 px-4 text-black no-underline" href="#">Servicios</a>
          </li>
          <li class="mr-3">
            <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
              href="{{route('posts.index')}}">Blog</a>
          </li>
          <li class="mr-3" x-data="{open:false}">

            @auth
              
            <button x-on:click="open=true" type="button" 
              class="flex items-center justify-between w-full py-2 px-4 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:w-auto">
              Perfil
              <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 4 4 4-4" />
              </svg>
            </button>
            <!-- Dropdown menu -->
            <div x-show="open" x-on:click.away="open=false"
              class="z-10 absolute font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-xl w-44 dark:bg-gray-700 dark:divide-gray-600">
              <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" >
                <li>
                  <a href="{{route('profile.show')}}"
                    class="block px-4 py-2 hover:bg-gray-100">Perfil</a>
                </li>
                @can('admin.home') 
                  <li>
                    <a href="{{route('admin.home')}}"
                      class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
                  </li>
                @endcan
              </ul>
              <div class="py-1">

                <form method="POST" action="{{route('logout')}}" x-data>
                  @csrf
                  <a href="{{route('logout')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                    tabindex="-1" id="user-menu-item-2" @click.prevent="$root.submit();">Salir</a>
                </form>

                {{-- <form method="POST" action="{{route('logout')}}">
                  @csrf
                  <a href="{{route('logout')}}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" @click.prevent="$root.submit();">
                    Cerrar sesión
                  </a>
                </form> --}}
              </div>
            </div>

            @else 
              <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
              href="{{route('login')}}">Iniciar sesión</a>
            @endauth
          </li>


        </ul>
        <button id="navAction"
          class="mx-auto lg:mx-0 bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
          Empezar
        </button>
      </div>
    </div>
    {{-- <hr class="border-b border-gray-100 opacity-25 my-0 py-0" /> --}}
  </nav>


  <nav class="">

    {{-- <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <button x-on:click="open=true" type="button"
            class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
            aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!--
                Icon when menu is closed.
    
                Menu open: "hidden", Menu closed: "block"
              -->
            <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
              aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!--
                Icon when menu is open.
    
                Menu open: "block", Menu closed: "hidden"
              -->
            <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
              aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">

          <a href="/" class="flex shrink-0 items-center text-cyan-500 font-bold text-2xl">
            Blogg
          </a>

          <div class="hidden sm:ml-6 sm:block">
            <div class="flex space-x-4">

              @foreach ($categories as $categorie)
              <a href="{{route('posts.category',$categorie)}}"
                class="rounded-md px-3 py-2 text-sm font-medium text-slate-500 hover:bg-cyan-200 hover:text-slate-500">
                {{$categorie->name}}
              </a>
              @endforeach


            </div>
          </div>
        </div>

        @auth
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          <button type="button"
            class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View notifications</span>
            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
              aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
            </svg>
          </button>

          <!-- Profile dropdown -->
          <div class="relative ml-3" x-data="{open:false}">
            <div>
              <button x-on:click="open=true" type="button"
                class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">Open user menu</span>
                <img class="size-8 rounded-full" src="{{auth()->user()->profile_photo_url}}" alt="">
              </button>
            </div>

            <!--
                  Dropdown menu, show/hide based on menu state.
      
                  Entering: "transition ease-out duration-100"
                    From: "transform opacity-0 scale-95"
                    To: "transform opacity-100 scale-100"
                  Leaving: "transition ease-in duration-75"
                    From: "transform opacity-100 scale-100"
                    To: "transform opacity-0 scale-95"
                -->
            <div x-show="open" x-on:click.away="open=false"
              class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none"
              role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
              <!-- Active: "bg-gray-100 outline-none", Not Active: "" -->
              <a href="{{route('profile.show')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                tabindex="-1" id="user-menu-item-0">Perfil</a>

              @can('admin.home')
              <a href="{{route('admin.home')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                tabindex="-1" id="user-menu-item-0">
                Dashboard
              </a>
              @endcan

              <form method="POST" action="{{route('logout')}}" x-data>
                @csrf
                <a href="{{route('logout')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                  tabindex="-1" id="user-menu-item-2" @click.prevent="$root.submit();">Salir</a>
              </form>

            </div>
          </div>
        </div>

        @else
        <a href="{{route('login')}}"
          class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Iniciar
          sesión</a>
        <a href="{{route('register')}}"
          class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Registrate</a>

        @endauth


      </div>
    </div> --}}

    <!-- Mobile menu, show/hide based on menu state. -->
    {{-- <div class="sm:hidden" id="mobile-menu" x-show="open" x-on:click.away="open=false">
      <div class="space-y-1 px-2 pb-3 pt-2">

        @foreach ($categories as $categorie)
        <a href="{{route('posts.category',$categorie)}}"
          class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
          {{$categorie->name}}
        </a>
        @endforeach

      </div>
    </div> --}}
  </nav>

</div>