<x-pages.posts.base>
    <x-text.title>
        Categorías
    </x-text.title>

    <x-cards.main-card>

        @can('crear categorias publicaciones')
            <div class="flex justify-end">
                <x-button.button
                    variant="danger"
                    :href="route('posts.categories.create')"
                >
                    Crear categoría
                </x-button.button>
            </div>
        @endcan

        @if(count($categories) > 0)
            <x-table.table-wrapper>
                <x-table.table>
                    <x-table.thead>
                        <x-table.row>
                            <x-table.column type="thead">
                                Descripción
                            </x-table.column>

                            <x-table.column type="thead">
                                Acciones
                            </x-table.column>
                        </x-table.row>
                    </x-table.thead>
                    <x-table.tbody>
                        @foreach($categories as $category)
                            <x-table.row>
                                <x-table.column>
                                    {{$category->description}}
                                </x-table.column>

                                <x-table.column>
                                    <div class="flex justify-center">
                                        <x-button.button
                                            :href="route('posts.categories.edit', $category->id)"
                                        >
                                            Ver
                                        </x-button.button>
                                    </div>
                                </x-table.column>
                            </x-table.row>
                        @endforeach

                    </x-table.tbody>
                </x-table.table>
            </x-table.table-wrapper>

            <div>
                {{$categories->links()}}
            </div>
        @else
            <x-text.paragraph position="center">
                Aún no hay categorías registradas
            </x-text.paragraph>
        @endif

    </x-cards.main-card>

</x-pages.posts.base>
