@props(['name' => '', 'id' => '', 'class' => '', 'checked' => false])

<input
    type="checkbox"
    id="{{$id}}"
    name="{{$name}}"
    class="{{$class . " w-4 h-4 text-main-primary bg-gray-100 rounded focus:ring-dark-gold dark:focus:ring-dark-gold
        dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600
    "}}"
    @checked($checked)
/>
