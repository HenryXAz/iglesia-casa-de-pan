@props(['for' => '', 'position' => 'left'])

@error($for)
    <x-text.paragraph position="{{$position}}" class="text-red-700 dark:text-red-400">
        {{$message}}
    </x-text.paragraph>
@enderror
