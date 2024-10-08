@props(['variant' => 'primary', 'type' => 'button', 'href' => ''])

@php
$commonClassesSolidButton = "border-2 border-transparent outline-none text-dark-text";
$commonClassesTransparentButton = "border-2 border-transparent outline-none bg-transparent";

$variantButton = match($variant) {
    'primary' =>
        $commonClassesSolidButton . ' bg-main-primary-hard dark:focus:border-main-primary focus:outline-main-primary',
    'secondary' =>
        $commonClassesSolidButton . ' bg-light-gold dark:focus:border-light-gold text-light-text dark:focus:border-light-gold focus:outline-light-gold',
    'danger' =>
        $commonClassesSolidButton . ' bg-main-rose dark:focus:border-main-rose focus:outline-main-rose',
    'success' =>
        $commonClassesSolidButton . ' bg-emerald-700 dark:focus:border-emerald-600 focus:outline-emerald-600',
    'black' =>
        $commonClassesSolidButton . ' bg-black dark:focus:border-black focus:outline-black',
    'gray' =>
        $commonClassesSolidButton . ' bg-gray-200 dark:bg-gray-700 dark:focus:border-gray-600 focus:outline-gray-600 dark:text-dark-text text-light-text',
    'secondary-transparent' =>
        $commonClassesTransparentButton . ' focus:outline-dark-gold dark:text-dark-gold text-light-gold',
    'danger-transparent' =>
        $commonClassesTransparentButton . ' focus:outline-main-rose text-main-rose dark:text-main-rose-light',
    'success-transparent' =>
        $commonClassesTransparentButton . ' focus:outline-emerald-600 text-emerald-700 dark:text-emerald-500',
};
@endphp

@if ($href != '')
    <a {{$attributes}} href="{{$href}}" class="{{$variantButton . " rounded-md p-2"}}">
        {{$slot}}
    </a>
@else
    <button {{$attributes}} type="{{$type}}" class="{{$variantButton . " rounded-md p-2"}}">
        {{$slot}}
    </button>
@endif
