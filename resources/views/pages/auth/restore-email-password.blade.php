<x-layouts.guest>
    <x-text.title position="center">
        Restaurar contraseña
    </x-text.title>


    <div class="max-w-xl mx-auto">
        <x-cards.main-card>
            <x-form.form :action="route('restore.email.password')">

               <x-form.input type="hidden" value="{{$id}}" name="id" />

                <x-form.label for="password">
                    Ingrese Nueva contraseña:
                    <x-form.input type="password" name="password" />
                    <x-error-message.error-message for="password" />
                </x-form.label>

                <x-form.label for="password-confirmation">
                    Confirme nueva contraseña:
                    <x-form.input type="password" name="password_confirmation" />
                    <x-error-message.error-message for="password_confirmation" />
                </x-form.label>

                <div class="py-5 flex justify-center">
                    <x-button.button variant="success" type="submit">
                        Restaurar
                    </x-button.button>
                </div>
            </x-form.form>
        </x-cards.main-card>
    </div>
</x-layouts.guest>
