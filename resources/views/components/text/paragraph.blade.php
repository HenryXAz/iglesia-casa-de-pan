@props(['position' => 'left', 'class' => ''])

@php
    $positionText = match ($position) {
        'justify' => 'text-justify',
        'center' => 'text-center',
        'right' => 'text-right',
        'left' => 'text-left',
    };
@endphp

<p {{$attributes}} class="{{$class . " " . $positionText . " text-xs md:text-sm text-light-text dark:text-dark-text"}}">
    {{$slot}}
</p>
