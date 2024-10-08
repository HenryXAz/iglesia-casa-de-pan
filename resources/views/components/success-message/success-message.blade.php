@props(['message' => '', 'class' => '', 'position' => 'left'] )

@if(session($message))
    <x-text.paragraph :class="$class . ' text-emerald-600 dark:text-emerald-500'" :position="$position">
        {{session($message)}}
    </x-text.paragraph>
@endif
