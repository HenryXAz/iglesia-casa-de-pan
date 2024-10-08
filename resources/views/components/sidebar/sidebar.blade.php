@props(['class' => ""])

@php
    $logo = '/images/logo.svg';

   $links = [
        [
            'route' => 'welcome',
            'description' => 'Home',
            'icon' => '',
            'role' => '',
        ],
        [
            'route' => 'users.index',
            'description' => 'Gestión usuarios',
            'icon' => '',
            'role' => 'listar usuarios',
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
        class="{{$class . ' fixed md:left-0 px-3 py-2 bg-light-color-1 dark:bg-dark-color-1'}}"
    >
        <div class="flex justify-between mb-10">
            <img src="{{asset($logo)}}" alt="logo" width="75">
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
