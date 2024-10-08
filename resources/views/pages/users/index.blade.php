<x-pages.users.base>
    <x-text.title>
        Gestion de usuarios
    </x-text.title>

    <x-cards.main-card>
        @can('crear usuarios')
            <div class="flex justify-end">
                <x-button.button
                    variant="danger"
                    :href="route('users.create')"
                >
                    Crear nuevo usuario
                </x-button.button>
            </div>
        @endcan

        <x-table.table-wrapper>
            <x-table.table>
                <x-table.thead>
                    <x-table.row>
                        <x-table.column type="thead">
                            Identificador
                        </x-table.column>

                        <x-table.column type="thead">
                            Estado
                        </x-table.column>
                        <x-table.column type="thead">
                            Tipo
                        </x-table.column>

                        <x-table.column type="thead">
                            Verificación
                        </x-table.column>
                        <x-table.column type="thead">
                            Acciones
                        </x-table.column>
                    </x-table.row>
                </x-table.thead>
                <x-table.tbody>
                    @foreach($users as $user)
                        <x-table.row>
                            <x-table.column>
                                {{$user->identifier}}
                            </x-table.column>
                            <x-table.column>
                                @if($user->state == \App\Enums\Users\UserState::ACTIVE)
                                    <div class="text-emerald-500">
                                        {{$user->state->value()}}
                                    </div>
                                @else
                                    <span class="dark:text-main-rose-light text-main-rose">
                                               {{$user->state->value()}}
                                            </span>
                                @endif
                            </x-table.column>
                            <x-table.column>
                                {{$user->type->value()}}
                            </x-table.column>
                            <x-table.column>
                                {{
                                ($user->verificationState != null) ?
                                "Verificado el {$user->verificationState->format('d-m-Y')}"
                                : 'Aún no verificado'
                                }}
                            </x-table.column>
                            <x-table.column>
                                <div class="py-2 flex justify-center gap-2">

                                    <x-button.button :href="route('users.show', $user->id)">
                                        Ver
                                    </x-button.button>

                                    <x-button.button variant="secondary"
                                                     :href="route('users.edit', $user->id)"
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
            {{$users->links()}}
        </div>

    </x-cards.main-card>

</x-pages.users.base>

