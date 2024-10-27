@props(['class' => ""])

@php
    $logo = '/images/logo.svg';

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
            'role' => 'listar publicaciones',
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

<div x-data="sidebar">
    <div
        class="sticky flex justify-end w-full md:hidden text-gray-800 p-2 dark:text-gray-200 bg-light-color-1 dark:bg-dark-color-1"
    >
        <button class="text-3xl"
                @click="toggleSidebar()"
        >
            ☰
        </button>
    </div>
    <aside
        x-show="isOpen"
        x-transition
        x-transition.duration.300ms
        class="{{$class . ' md:mt-0  md:left-0 px-3 py-2 bg-light-color-1 dark:bg-dark-color-1'}}"
    >
        <div class="flex gap-2 flex-wrap justify-between mb-10">
            <a href="{{route('home')}}">
                <img src="{{asset($logo)}}" alt="logo" width="75">
            </a>
            <x-toggle-theme.toggle-theme/>
        </div>

        <x-user-card-sidebar.user-card-sidebar/>

        <nav>
            @foreach($links as $link)
                <div>
                    @if(Auth::user()->can($link['role']) || $link['role'] == '')
                        <x-sidebar.link route="{{$link['route']}}">
                            {{$link['icon']}} {{$link['description']}}
                        </x-sidebar.link>

                    @endif
                </div>
            @endforeach
        </nav>
    </aside>
</div>
