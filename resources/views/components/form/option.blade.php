@props(['value' => '', 'class' => '', 'selected' => false])

<option
    value="{{$value}}"
    @selected($selected)
    class="{{$class . " bg-light-color-1 dark:bg-dark-color-1 p-2"}}"
>
    {{$slot}}
</option>
