<div class="">

  <nav id="header" class="fixed w-full z-30 top-0 border-b-2 md:border-b-0 text-white gradient py-2">
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
        class="w-full flex-grow h-full lg:flex lg:items-center lg:w-auto hidden p-4 mt-2 lg:mt-0 lg:bg-transparent text-black lg:p-0 z-20"
        id="nav-content">
        <ul class="list-reset lg:flex justify-end flex-1 items-center">
          <li class="mr-3">
            <a class="inline-block py-2 px-4 text-slate-950 hover:text-slate-800 no-underline" href="/#services">Servicios</a>
          </li>
          <li class="mr-3">
            <a class="inline-block text-slate-950 hover:text-slate-800 py-2 px-4"
              href="{{route('posts.index')}}">Blog</a>
          </li>
          <li class="mr-3" x-data="{open:false}">

            @auth
              
            <button x-on:click="open=true" type="button" 
              class="flex mb-4 items-center justify-between w-full py-2 px-4 text-slate-950 md:mb-0 hover:text-slate-800 rounded-sm md:hover:bg-transparent md:border-0 md:w-auto">
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
              </div>
            </div>

            @else 
              <a class="inline-block text-slate-950 hover:text-slate-800 py-2 px-4"
              href="{{route('login')}}">Iniciar sesión</a>
            @endauth
          </li>


        </ul>
        <a href="/#contact" id="navAction"
          class="mx-auto  lg:mx-0 bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-90 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
          Empezar
        </a>
      </div>
    </div>
  </nav>
  

</div>