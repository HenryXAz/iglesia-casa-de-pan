@vite(['resources/css/app.css'])

<div class="max-w-xl mx-auto">

    <x-cards.main-card>

        <div class="my-5">
            <img src="{{asset('/images/logo.svg')}}" alt="logo" width="75">
        </div>

        <x-text.paragraph>
            Este correo corresponde a una solicitud de cambio de contraseña,
            para realizar el cambio da click al botón de abajo. Se generará un enlace que te permitirá
            cambiar tu contraseña
        </x-text.paragraph>

        <div class="mt-5">
            <x-button.button
                :href="
                    \Illuminate\Support\Facades\URL::temporarySignedRoute(
                        'restore.email-password.view',
                        now()->addMinutes(50),
                        [
                            'id' => $id,
                        ]
                    )
                "
                variant="primary">
                Generar Enlace
            </x-button.button>
        </div>
    </x-cards.main-card>

</div>
