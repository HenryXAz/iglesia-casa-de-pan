@props(['items' => []])

@php
    $classes = 'inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-30';

    function generateClasses(string $route) {
        return match(request()->routeIs($route)) {
            true => 'inline-block p-4 text-main-primary-hard border-b-2 border-main-primary-hard rounded-t-lg active dark:text-main-primary dark:border-main-primary',
            false =>  'inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-light-gold hover:border-light-gold dark:hover:text-gray-30',
        };
    }
@endphp

<div
    class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px">

        @foreach($items as $item)

            @can($item['permission'])

                <li class="me-2">
                    <a href="{{
                    route($item['route']) ?? '#'
                }}"
                       class="{{
                    generateClasses($item['route'])
                   }}"
                    >{{$item['name']}}</a>

                </li>
            @endcan
        @endforeach
    </ul>
</div>
