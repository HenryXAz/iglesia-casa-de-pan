<x-pages.users.base>

    <x-cards.main-card class="max-w-xl">

        <x-text.title>
            Rol <span class="font-bold">
                {{ $role->name }}
            </span>
        </x-text.title>

        <div class="mt-5">

            <x-text.paragraph class="mb-5">
                Permisos Asignados:
            </x-text.paragraph>

            <x-list.list
                :items="$role->permissions"
                content-name="name"
            />
        </div>

    </x-cards.main-card>

</x-pages.users.base>
