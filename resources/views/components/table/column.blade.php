@props(['class' => '', 'type' => 'tbody'])

@if ($type === 'tbody')
   <td
    class="{{$class . " p-2 text-xs md:text-sm dark:text-dark-text text-light-text"}}"
   >
        {{$slot}}
   </td>
@endif

@if ($type === 'thead')
    <th
        class="{{$class . " p-2  text-xs md:text-sm bg-light-color-2 text-light-text dark:text-dark-text dark:bg-dark-color-3
            text-left
        "}}"
    >
        {{$slot}}
    </th>

@endif
