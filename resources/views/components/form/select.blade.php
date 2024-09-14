@props(['name' => '', 'id' => '', 'class' => ''])

<select
    name="{{$name}}"
    id="{{$id}}"
    class="{{$class . " p-2 bg-transparent border border-gray-400 dark:border-dark-color-3 rounded-md outline-none
        focus:outline-4 dark:focus:outline-main-primary focus:outline-main-primary
    "}}"
>
    {{$slot}}
</select>
