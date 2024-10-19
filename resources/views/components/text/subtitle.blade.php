@props(['type' => 'h2', 'class' => ''])

@if ($type == 'h2')
    <h2 class="{{ $class . ' text-base md:text-2xl text-light-text dark:text-dark-text'}}">
        {{$slot}}
    </h2>
@endif

@if ($type == 'h3')
    <h3 class="{{$class . ' text-base md:text-xl text-light-text dark:text-dark-text'}}">
        {{$slot}}
    </h3>
@endif
