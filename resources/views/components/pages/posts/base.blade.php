<x-layouts.app>
    <x-cards.container>

        <x-tabs.tabs
            :items="[
                [
                    'route' => 'posts.index',
                    'name' => 'Publicaciones',
                    'permission' => 'listar publicaciones',
                ],
                [
                    'route' => 'posts.categories.index',
                    'name' => 'Categorías',
                    'permission' => 'listar categorias publicaciones',
                ],
            ]"
        />

        {{$slot}}
    </x-cards.container>
</x-layouts.app>
