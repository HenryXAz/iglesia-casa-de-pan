@vite(['resources/css/app.css'])

<div class="container mx-auto bg-light-color-1 p-2 flex justify-center flex-col">
    <div class="mb-5">
        <img src="{{asset('/images/logo.svg')}}" alt="logo" width="75">
    </div>

    <x-text.title position="center">
        Verificación de cuenta Iglesia Casa de Pan y Alabanza
    </x-text.title>

    <x-text.paragraph position="center">
        Haga click en el butón de abajo para poder activar tu cuenta <br>
        en el sistema de Iglesia Casa de Pan y Alabanza
    </x-text.paragraph>

    <div class="w-[100px] mx-auto flex justify-center py-5">
        <x-button.button
            :href="
                \Illuminate\Support\Facades\URL::temporarySignedRoute('verification.verify',
                now()->addMinutes(10),
                [
                    'id' => $id,
                    'hash' => $hash
                ])
            "
            target="_blank"
        >
            Verificar
        </x-button.button>
    </div>
</div>
