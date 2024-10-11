<x-pages.posts.base>
        <x-text.title>
            Publicaciones
        </x-text.title>

        <x-cards.main-card>
            @can('crear publicaciones')

                <div class="flex justify-end">
                    <x-button.button
                            href="{{route('posts.create')}}"
                            variant="danger"
                    >
                        Crear nueva publicación
                    </x-button.button>
                </div>
            @endcan

            @if(count($posts) == 0)
                <x-text.paragraph position="center">
                    Aún no hay publicaciones
                </x-text.paragraph>
            @else
                <x-table.table-wrapper>
                    <x-table.table>
                        <x-table.thead>
                            <x-table.row>
                                <x-table.column type="thead">
                                    Título
                                </x-table.column>
                                <x-table.column type="thead">
                                    Descripción
                                </x-table.column>
                                <x-table.column type="thead">
                                    Categoría
                                </x-table.column>
                                <x-table.column type="thead">
                                    Acciones
                                </x-table.column>

                            </x-table.row>
                        </x-table.thead>
                        <x-table.tbody>
                            @foreach($posts as $post)
                                <x-table.row>
                                    <x-table.column>
                                        {{$post->title}}
                                    </x-table.column>
                                    <x-table.column>
                                        {{$post->description}}
                                    </x-table.column>
                                    <x-table.column>
                                        {{$post->category->description}}
                                    </x-table.column>
                                    <x-table.column>
                                        <div class="flex justify-center">
                                            <x-button.button
                                                :href="route('posts.edit', $post->id)"
                                            >
                                                Editar
                                            </x-button.button>
                                        </div>
                                    </x-table.column>
                                </x-table.row>
                            @endforeach

                        </x-table.tbody>
                    </x-table.table>
                </x-table.table-wrapper>

                <div>
                    {{$posts->links()}}
                </div>
            @endif

        </x-cards.main-card>
</x-pages.posts.base>
