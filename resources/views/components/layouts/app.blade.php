@php

$logo = '/images/logo.svg';
$institution_logo = '/images/institution_logo.jpg';

   $links = [
        [
            'route' => 'dashboard',
            'description' => 'Dashboard',
            'icon' => '',
            'role' => '',
        ],
        [
            'route' => 'users.index',
            'description' => 'Gestión usuarios',
            'icon' => '',
            'role' => 'listar usuarios',
        ],
        [
            'route' => 'posts.index',
            'description' => 'Gestión publicaciones',
            'icon' => '',
            'role' => 'listar publicaciones',
        ],
        [
            'route' => 'special-events.index',
            'description' => 'Gestión de actividades',
            'icon' => '',
            'role' => 'listar actividades',
        ],
        [
            'route' => 'food_products.index',
            'description' => 'Venta de alimentos',
            'icon' => '',
            'role' => 'listar venta de alimentos',
        ],
        [
            'route' => 'food_deliveries.index',
            'description' => 'Entregas',
            'icon' => '',
            'role' => 'entregar ordenes de venta de alimentos',
        ],
   ];
@endphp

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/tinymce.js'])
</head>
<body class="dark:bg-dark-color-1 bg-light-color-2">

<div class="bg-light-color-2 dark:bg-dark-color-1">
    <!--
           // Alpine.js component for the sidebar, initialized with 'open' state set to false -->
    <div x-data="{ open: false }" @keydown.window.escape="open = false">
        <!--
                // Overlay that appears when the sidebar is open
               // Controls the visibility based on 'open' state
               // Ensures overlay is above other content
              -->
        <div x-show="open" class="relative z-50" x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." x-ref="dialog" aria-modal="true" style="display: none;">
            <!--
                     // Backdrop for the sidebar, dims the screen when sidebar is open
                     // Display control based on 'open' state
                     // Full screen backdrop with semi-transparent background
                   -->
            <div x-show="open" class="fixed inset-0 bg-dark-color-3/25" x-description="Off-canvas menu backdrop, show/hide based on off-canvas menu state." style="display: none;"></div>
            <!--
                      // Container for the actual sidebar content
                      // Sidebar area
                      // Sidebar styling
                      // Close sidebar when clicking outside of it
                      // Display control based on 'open' state
                     -->
            <div class="fixed inset-0 flex">
                <div x-show="open" x-description="Off-canvas menu, show/hide based on off-canvas menu state." class="relative mr-16 flex w-full max-w-48 sm:max-w-72 flex-1" @click.away="open = false" style="display: none;">
                    <!--
                               // Close button for the sidebar
                               // Display control based on 'open' state
                             -->
                    <div x-show="open" x-description="Close button, show/hide based on off-canvas menu state." class="absolute left-full top-0 flex w-16 justify-center pt-5" style="display: none;">
                        <!-- Positioning of the close button --> <button type="button" class="-m-2.5 p-2.5" @click="open = false">
                            <!-- Toggle 'open' state to close sidebar --> <span class="sr-only">Close sidebar</span> <!-- Accessibility text -->
                            <!-- Close icon --> <svg class="h-6 w-6 dark:text-dark-text text-light-text" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>

                    </div>
                    <!--
                               // Navigation list within the sidebar
                               // Styling for the navigation container
                               // Styling for navigation links
                               // Dynamically generate menu items

                             -->
                    <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-light-color-1 dark:bg-dark-color-1 px-6 pb-2">

                        <div class="w-full mx-auto flex justify-end mt-4">

                            <x-toggle-theme.toggle-theme />
                        </div>

                        <div class="w-full mx-auto flex justify-center">
                            <x-user-card-sidebar.user-card-sidebar/>
                        </div>


                        <nav class="flex flex-1 flex-col pt-6">
                                <ul role="list" class="flex flex-1 flex-col justify-center gap-y-7 text-xs md:text-sm  text-light-text dark:text-dark-text uppercase ">

                                    @foreach($links as $link)
                                        @if(Auth::user()->can($link['role']) || $link['role'] == '')
                                            <li> <a class="{{'hover:text-dark-gold ' . (request()->routeIs($link['route']) ? ' text-main-primary-hard '  : '')}}" href="{{route($link['route'])}}"> {{$link['description']}}</a> </li>
                                        @endif
{{--                                    <li> <a class="{{'hover:text-dark-gold ' . (request()->routeIs('users.index')) ? ' text-main-primary-hard '  : ''}}" href="{{route('users.index')}}"> Usuarios</a> </li>--}}

                                    @endforeach
                                </ul>

                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!--
                // Button to open the sidebar
                // Styling for the button container
              -->
        <div class="sticky top-0 z-40 text-light-text dark:text-dark-text flex justify-start gap-x-6  px-4 py-4 shadow-sm sm:px-10 bg-light-color-1 dark:bg-dark-color-2 max-w-screen-2xl mx-auto">
            <!--
                   // Button styling
                   // Toggle 'open' state to show sidebar --> <button type="button" class="-m-2.5 p-2.5 text-light-text dark:text-dark-text" @click="open = true">
                <!-- Accessibility text --> <span class="sr-only">Open sidebar</span> <!-- Hamburger icon --> <svg class="h-6 w-6" fill="none"" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                </svg>
            </button>

            <a href="{{route('home')}}">
            <x-text.paragraph class="flex gap-2 items-center flex-col md:flex-row ">
                    <img src="{{asset($institution_logo)}}" width="50px" class="object-scale-down" />
                    <img src="{{asset($logo)}}" width="50px" width="50px" class="object-scale-down" />

                IGLESIA CASA DE PAN
            </x-text.paragraph>

            </a>
        </div> <!-- Main content area -->
        <main class="py-4 min-h-screen bg-light-color-2 dark:bg-dark-color-1">
            {{$slot}}
        </main> <!-- Starts links to tutorial -->
    </div>
    <x-layouts.footer />
</div>

</body>
</html>



