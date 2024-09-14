@props(['position' => 'left', 'class' => ''])

@php
    $positionText = match ($position) {
        'justify' => 'text-justify',
        'center' => 'text-center',
        'right' => 'text-right',
        'left' => 'text-left',
    };
@endphp

<p class="{{$class . " " . $positionText . " text-sm md:text-base text-light-text dark:text-dark-text"}}">
    {{$slot}}
</p>
