<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}}</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="bg-light-color-2 dark:bg-dark-color-1">

    <div class="max-w-xl mx-auto flex justify-end mt-5">
        <x-toggle-theme.toggle-theme/>
    </div>


    <div class="max-w-xl mx-auto">
        <x-cards.main-card>
            <div class="w-full flex justify-center">
                <x-icons.email/>
            </div>

            <x-text.title position="center">
                Verifica tu correo electrónico
            </x-text.title>

            <x-text.paragraph position="center">
                Antes de comenzar a utilizar nuestros servicios <br> es necesario verificar la autenticidad de tu correo
                electrónico. <br> Para ello hemos enviado un correo a {{Auth::user()->identifier}}
            </x-text.paragraph>

            @if(session('resent_message'))
                <span class="block mt-5 mx-auto container text-center text-emerald-700 dark:text-emerald-500">
               {{session('resent_message')}}
            </span>
            @endif

            <div class="flex justify-center my-5 ">
                <x-form.form :action="
                \Illuminate\Support\Facades\URL::temporarySignedRoute(
                    'verification.send',
                    now()->addMinutes(5),
                    [
                        'id' => Auth::user()->id,
                    ]
                )
            "
                >
                    <x-button.button variant="success" type="submit">
                        Reenviar correo
                    </x-button.button>
                </x-form.form>

            </div>
        </x-cards.main-card>
    </div>
</body>
</html>
