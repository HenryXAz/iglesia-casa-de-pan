@props(['position' => 'left'])

@php
$positionText = match($position) {
    'justify' => 'text-justify',
    'center' => 'text-center',
    'left' => 'text-left',
    'right' => 'text-right',
};
@endphp

<h1
    class="{{$positionText . " " . "bg-transparent text-light-text dark:text-dark-text text-bold text-lg md:text-2xl"}}"
>
    {{$slot}}
</h1>
