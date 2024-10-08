@php
    $spanClasses = "font-light dark:text-dark-text text-gray-200";

@endphp

<nav
    class="w-full my-10"
    x-data="user_card_sidebar"
>
    <button
        class="text-base dark:bg-main-primary-hard bg-main-primary-hard/75 text-gray-800 rounded-md border-gray-300 dark:border-x-dark-color-4 p-2 wire:bg-transparent outline-none flex justify-between items-center w-full hover:cursor-pointer"
        @click="openOptions"
    >
        <text- class="text-sm dark:text-dark-text text-gray-200">
            {{Auth::user()->identifier}}
        </text->
        <span class="{{$spanClasses}}" x-show="!showOptions">
            ▼
        </span>
        <span class="{{$spanClasses}}" x-show="showOptions">
            ▲
        </span>
    </button>

    <ul class="w-full flex flex-col border-b border-b-gray-300 dark:bg-dark-color-3 dark:border-dark-color-4 rounded-md" x-show="showOptions"
        x-transition
        x-transition.duration.300ms
    >
        <li>
            <x-user-card-sidebar.link href="#">
                Perfil
            </x-user-card-sidebar.link>
        </li>
        <li>
            <x-form.form method="POST"  action="{{route('logout')}}">
                <x-user-card-sidebar.link type="submit">
                    Cerrar Sesión
                </x-user-card-sidebar.link>
            </x-form.form>

        </li>
    </ul>
</nav>
