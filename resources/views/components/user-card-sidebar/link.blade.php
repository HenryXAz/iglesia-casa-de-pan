@props(['href' => '', 'type' => 'button'])

@php
    $classes = "block border-x border-x-gray-300 dark:border-x-dark-color-4 w-full text-left transition-all duration-500 ease-in-out text-light-text dark:text-dark-text px-1 py-3 font-light hover:bg-main-primary/10 dark:hover:bg-dark-color-2"

@endphp

@if ($href == "")
    <button
        type="{{$type}}"
        class="{{$classes . " "}}"
    >
        {{$slot}}
    </button>
@endif

@if($href != "")
    <a
        href="{{$href}}"
        class="{{$classes . " "}}"
    >
        {{$slot}}
    </a>

@endif
