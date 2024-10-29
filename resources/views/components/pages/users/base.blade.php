<x-layouts.app>
    <x-cards.container>

        <x-tabs.tabs
            :items="[
                [
                    'route' => 'users.index',
                    'name' => 'Usuarios',
                    'permission' => 'listar usuarios'
                ],
                [
                    'route' => 'users.roles',
                    'name' => 'Roles',
                    'permission'  => 'listar roles',
                ],
            ]"
        />

        {{$slot}}
    </x-cards.container>
</x-layouts.app>
