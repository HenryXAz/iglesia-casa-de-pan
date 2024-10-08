<x-layouts.guest>
    <x-pages.auth.login-page-base title="Iniciar Sesión con Nombre de Usuario">
        <x-cards.main-card>

            <x-form.form action="{{route('login.username.post')}}">
                <x-form.label for="username">
                    Nombre de usuario:
                    <x-form.input name="username" value="{{old('username')}}"/>
                    <x-error-message.error-message for="username"/>
                </x-form.label>

                <x-form.label for="password">
                    Contraseña:
                    <x-form.input name="password" type="password" />
                    <x-error-message.error-message for="password" />
                </x-form.label>

                <x-form.label for="password_confirmation">
                    Confirmar contraseña:
                    <x-form.input name="password_confirmation" type="password" />
                    <x-error-message.error-message for="password_confirmation" />
                </x-form.label>

                <div class="flex justify-center">
                    <x-button.button type="submit">
                        Iniciar Sesión
                    </x-button.button>
                </div>
            </x-form.form>
        </x-cards.main-card>

        <x-text.paragraph>
            Para iniciar mediante correo electrónico haga click
            en el siguiente
            <a
                class="text-main-light-primary"
                href="{{route('login.email')}}">
                enlace
            </a>
        </x-text.paragraph>

    </x-pages.auth.login-page-base>
</x-layouts.guest>
