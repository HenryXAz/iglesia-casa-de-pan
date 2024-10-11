<x-pages.posts.base>
    <x-text.title>
        Editar categoría
    </x-text.title>

    <x-success-message.success-message
        message="update_success"
        position="center"
    />

    <x-success-message.success-message
        message="creation_success"
        position="center"
    />

    <x-error-message.error-message
        for="update_error"
        position="center"
    />

    <x-pages.posts.form-category
        mode="edit"
        :category="$category"
    />
</x-pages.posts.base>
