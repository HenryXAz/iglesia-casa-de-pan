<x-layouts.guest>


    <div class="max-w-xl mx-auto">
        <x-success-message.success-message message="email_sent" position="center" />

        <x-cards.main-card>

            <x-form.form
                :action="route('restore.link')"
            >
                <x-form.label>
                    Ingresar Email:
                    <x-form.input name="email" type="email"/>
                    <x-error-message.error-message for="email" />
                </x-form.label>

                <x-button.button type="submit" variant="primary">
                    Enviar correo
                </x-button.button>
            </x-form.form>

            <div class="mt-4">

                <x-text.paragraph class="italic ">
                    Se enviará un correo a la dirección indicada,
                    dicho correo contendrá un enlace que le permitirá ingresar
                    nuevas credenciales. (El enlace solo tendrá una vigencia de 5 minutos, una ves alcanzado el límite
                    de tiempo el enlace caducará
                    y deberá de generar un nuevo enlace)
                </x-text.paragraph>
            </div>
        </x-cards.main-card>
    </div>

</x-layouts.guest>
