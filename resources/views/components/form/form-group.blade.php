@props(['class' => ''])

<div
    class="{{$class . " flex gap-2 w-full flex-col md:flex-row"}}"
>
    {{$slot}}
</div>
