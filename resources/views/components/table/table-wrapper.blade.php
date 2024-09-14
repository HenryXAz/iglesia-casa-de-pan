@props(['class' => ''])

<div
    class="{{$class . " w-full mt-5 mb-2 overflow-x-auto"}}"
>
    {{$slot}}
</div>
