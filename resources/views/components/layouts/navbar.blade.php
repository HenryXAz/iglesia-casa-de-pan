<div class="w-full text-gray-700 bg-light-color-2 dark-mode:text-gray-200 dark:bg-dark-color-1 p-2">
    <div x-data="{ open: false }"
         class="flex flex-col max-w-screen-2xl rounded-md px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8 bg-light-color-1 dark:bg-dark-color-2 ">
        <div class="p-4 flex flex-row items-center justify-between">
            <a href="{{route('home')}}"
               class="flex flex-col xl:flex-row items-center gap-2 text-sm lg:text-lg font-semibold tracking-widest text-light-text uppercase rounded-lg dark:text-dark-text focus:outline-none focus:shadow-outline">
                <div class="flex gap-2 flex-col md:flex-row">

                    <img src="{{asset('images/logo.svg')}}" width="50px" alt="UMG" class="object-scale-down"/>
                    <img src="{{asset('images/institution_logo.jpg')}}" width="50px"
                         alt="iglesia casa de pan y alabanza" class="object-scale-down"/>
                </div>
                <p class="text-xs sm:text-base">
                    Iglesia Casa de Pan
                </p>
            </a>
            <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg
                    viewBox="0 0 20 20" class="w-6 h-6 fill-gray-600 dark:fill-gray-200">
                    <path x-show="!open" fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <nav :class="{'flex': open, 'hidden': !open}"
             class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
            <a class="{{  (request()->routeIs('home') ? ' text-main-primary ' : ' text-light-text dark:text-dark-text') . " px-4 py-2 mt-2 text-sm md:text-xs lg:text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 dark:hover:bg-dark-color-1/50 hover:bg-dark-color-3/10 " }}"
               href="{{route('home')}}">Inicio</a>

            @if(Auth::user() == null)

                <a class="{{  (request()->routeIs('login.email') || request()->routeIs('login.username') ? ' text-main-primary ' : ' text-light-text dark:text-dark-text') . " px-4 py-2 mt-2 text-sm md:text-xs lg:text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 dark:hover:bg-dark-color-1/50 hover:bg-dark-color-3/10 " }}"
                   href="{{route('login.email')}}">Iniciar Sesión</a>
            @endif

            @if (Auth::user() != null && Auth::user()->type == 'EMAIL_USER' )
                <a class="{{  (request()->routeIs('dashboard') ? ' text-main-primary ' : ' text-light-text dark:text-dark-text') . " px-4 py-2 mt-2 text-sm md:text-xs lg:text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 dark:hover:bg-dark-color-1/50 hover:bg-dark-color-3/10 " }}"
                   href="{{route('dashboard')}}">Dashboard</a>
            @endif

            @can('entregar ordenes de venta de alimentos')
                <a class="{{  (request()->routeIs('food_deliveries.index') ? ' text-main-primary ' : ' text-light-text dark:text-dark-text') . " px-4 py-2 mt-2 text-sm md:text-xs lg:text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 dark:hover:bg-dark-color-1/50 hover:bg-dark-color-3/10 " }}"
                   href="{{route('food_deliveries.index')}}">Entregas</a>
            @endcan


            @if (Auth::user())
                <a class="{{  (request()->routeIs('blog') ? ' text-main-primary ' : ' text-light-text dark:text-dark-text') . " px-4 py-2 mt-2 text-sm md:text-xs lg:text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 dark:hover:bg-dark-color-1/50 hover:bg-dark-color-3/10 " }}"
                   href="{{route('blog')}}">Blog</a>

                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                            class="flex flex-row items-center text-sm md:text-xs lg:text-sm w-full px-4 py-2 mt-2 font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 text-light-text dark:text-dark-text hover:bg-main-primary-hard hover:text-dark-text">
                        <span>Servicios Exclusivos</span>
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                             class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                        <div class="px-2 py-2 rounded-md shadow bg-light-color-1 dark:bg-dark-color-3">
                            @can('puede inscribirse a actividades')
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg text-light-text dark:text-dark-text hover:bg-main-primary hover:text-dark-text"
                                   href="{{route('special-events.public.index')}}">Actividades</a>

                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg text-light-text dark:text-dark-text hover:bg-main-primary hover:text-dark-text"
                                   href="{{route('special-events.public.my_subscriptions')}}">Mis suscripciones</a>
                            @endcan

                            @can('puede ordenar alimentos')
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg text-light-text dark:text-dark-text hover:bg-main-primary hover:text-dark-text"
                                   href="{{route('food_products.public.index')}}">Venta de alimentos</a>

                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg text-light-text dark:text-dark-text hover:bg-main-primary hover:text-dark-text"
                                   href="{{route('food_products.public.my_food_orders')}}">Mis ordenes de alimentos</a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="flex items-center">
                    <x-form.form action="{{route('logout')}}">
                        <button type="submit"
                                class="{{  (request()->routeIs('logout') ? ' text-main-primary ' : ' text-light-text dark:text-dark-text') . " px-4 py-2 mt-2 text-sm md:text-xs lg:text-sm font-semibold bg-transparent cursor-pointer rounded-lg md:mt-0 md:ml-4 dark:hover:bg-dark-color-1/50 hover:bg-dark-color-3/10 " }}"
                        >Cerrar sesión</button>
                    </x-form.form>
                </div>
            @endif


            <div
                class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg md:mt-0 focus:text-gray-900 hover:bg-gray-200 dark:hover:bg-dark-color-2 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
            >
                <x-toggle-theme.toggle-theme/>
            </div>
        </nav>
    </div>
</div>
