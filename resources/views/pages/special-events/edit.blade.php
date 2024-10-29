<x-layouts.app>
    <x-cards.container>
        <x-text.title>
            Editar Actividad
        </x-text.title>

        <x-error-message.error-message for="update_error" />

        <x-success-message.success-message message="update_success" />

        <x-success-message.success-message message="creation_success" />

        <x-pages.special-events.form
            mode="edit"
            :specialEvent="$specialEvent"
            :transportationOptions="$transportationOptions"
        />
    </x-cards.container>
</x-layouts.app>
