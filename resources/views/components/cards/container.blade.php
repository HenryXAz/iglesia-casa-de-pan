@props(['class' => ''])

<div
    class="{{ $class . ' max-w-screen-2xl mx-auto px-2' }}"
>
    {{$slot}}
</div>
