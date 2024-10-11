@props(['class' => '', 'id' => '', 'name' => ''])

<input
    type="file"
    id="{{$id}}"
    name="{{$name}}"
    class="{{$class . " block file:bg-main-primary file:p-2 file:outline-none file:border-none file:active-outline-main-primary
        file:focus:outline-main-primary file:rounded-md w-full text-sm file:text-dark-text text-light-text border border-gray-300
        rounded-lg cursor-pointer bg-light-color-2 dark:text-dark-text focus:outline-none dark:bg-dark-color-1 dark:border-dark-color-4
        dark:placeholder-gray-400 p-2
    "}}"

    {{$attributes}}
/>
