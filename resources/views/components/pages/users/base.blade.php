<x-layouts.app>
    <div class="p-4  max-w-[2000px]  mx-auto min-h-screen ">
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
