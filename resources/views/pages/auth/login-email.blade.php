<x-layouts.guest>
    <x-pages.auth.login-page-base>
        <x-cards.main-card>
            <x-form.form
                action="{{route('login.email.post')}}"
            >
                <x-form.label for="email">
                    Correo Electrónico:
                    <x-form.input name="email" value="{{old('email')}}"/>
                    <x-error-message.error-message for="email"/>
                </x-form.label>

                <x-form.label for="password">
                    Contraseña:
                    <x-form.input name="password" type="password" />
                    <x-error-message.error-message for="password"/>
                </x-form.label>

                <x-form.label for="password_confirmation">
                    Confirmar contraseña:
                    <x-form.input name="password_confirmation" type="password" />
                    <x-error-message.error-message for="password_confirmation"/>
                </x-form.label>

                <div class="flex justify-end">
                    <a href="{{route('restore.email')}}"
                       class="italic font-light dark:text-purple-300 text-purple-700">
                        Reestablecer contraseña
                    </a>
                </div>

                <div class="flex justify-center">
                    <x-button.button type="submit">
                        Iniciar sesión
                    </x-button.button>
                </div>
            </x-form.form>

        </x-cards.main-card>

        <x-text.paragraph>
            Para iniciar mediante nombre de usuario haga click
            en el siguiente
            <a
                href="{{route('login.username')}}"
                class="text-main-light-primary">
                enlace
            </a>
        </x-text.paragraph>
    </x-pages.auth.login-page-base>

</x-layouts.guest>
