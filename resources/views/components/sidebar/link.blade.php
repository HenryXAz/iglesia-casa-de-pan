@props(['route' => ''])

@php
    $indexRoute = explode(".", $route);
    $subPathPattern = "/" . $indexRoute[0] . "\.w/";
    $isSubPath = preg_match($subPathPattern, \Illuminate\Support\Facades\Request::route()->getName());
    $classes = "text-sm block my-2 text-left rounded-md w-full p-2 ";
    $classes .= (\Illuminate\Support\Facades\Route::is($route) || $isSubPath)
    ?
        " bg-main-primary-hard text-gray-100
          dark:bg-dark-color-3
          dark:text-dark-gold
        "
    :
        "dark:text-gray-200";
@endphp

<a href="{{($route !== '') ? route($route) : "#"}}"
    class="{{$classes}}"
>
    {{$slot}}
</a>

