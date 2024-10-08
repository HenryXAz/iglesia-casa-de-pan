<x-layouts.app>
    <div class="p-4">
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
    </div>
</x-layouts.app>
