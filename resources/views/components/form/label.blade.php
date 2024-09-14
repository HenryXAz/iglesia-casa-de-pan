@props(['for' => '', 'class' => ''])

<label
    class="{{$class . " text-sm flex flex-col mb-2 gap-2 text-light-text dark:text-dark-text "}}"
    for="{{$for}}"
>
    {{$slot}}
</label>
