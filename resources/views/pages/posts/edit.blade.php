<x-pages.posts.base>
    <x-text.title>
        Editar publicación
    </x-text.title>

    <x-error-message.error-message
        for="update_error"
        position="center"
    />

    <x-success-message.success-message
        message="update_success"
        position="center"
    />

    <x-success-message.success-message
        message="creation_success"
        position="center"
    />

    <x-pages.posts.form
        mode="edit"
        :post="$post"
        :categories="$categories"
    />

</x-pages.posts.base>
