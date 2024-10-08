@props(['title' => 'Inicio de Sesión por Correo Electrónico', ])

<x-text.title position="center">
    {{$title}}
</x-text.title>


<div class="max-w-xl mx-auto">
    <x-error-message.error-message for="error_login" position="center"/>
    {{$slot}}
</div>
