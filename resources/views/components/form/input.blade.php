@props(['type' => 'text', 'name' => "", 'id' => '', 'value' => ''])

<input
    name="{{$name}}"
    id="{{$id}}"
    value="{{$value}}"
    class="w-full p-1.5 font-light text-sm md:text-base bg-gray-100 dark:bg-dark-color-3 text-light-text dark:text-dark-text
    outline-none
    border
    border-zinc-400 dark:border-dark-color-4 rounded-lg
    focus:ring-2 focus:border-transparent focus:ring-main-primary"
/>
