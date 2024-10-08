<x-layouts.app>
    <x-success-message.success-message
        message="update_success"
        position="center"
    />

    <x-error-message.error-message
        for="update_error"
    />

   <x-pages.users.form
       title="Editar usuario"
       mode="edit"
        :roles="$roles"
        :user="$user"
   />
</x-layouts.app>
