@props(['title' => 'Inicio de Sesión por Correo Electrónico', ])

<x-text.title position="center">
    {{$title}}
</x-text.title>


<div class="max-w-xl mx-auto">
    <div class="flex my-5 justify-center max-w-screen-2xl gap-2 flex-col md:flex-row items-center">
        <img src="{{asset('/images/logo.svg')}}" alt="umg-logo" width="100px" class="object-scale-down" />
        <img src="{{asset('/images/institution_logo.jpg')}}" width="100px" alt="logo institución" class="object-scale-down"/>
    </div>

    <x-error-message.error-message for="error_login" position="center"/>

    {{$slot}}
</div>
