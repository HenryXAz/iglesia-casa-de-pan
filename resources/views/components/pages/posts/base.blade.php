<x-layouts.app>
    <div class="m-4">

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
    </div>
</x-layouts.app>
