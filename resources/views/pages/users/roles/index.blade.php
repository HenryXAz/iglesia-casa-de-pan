<x-pages.users.base>
    <x-text.title>
        Gestion de Roles
    </x-text.title>

    <x-table.table-wrapper class="max-w-xl mx-auto">
        <x-table.table>
            <x-table.thead>
                <x-table.row>
                    <x-table.column type="thead">
                        Nombre
                    </x-table.column>

                    <x-table.column type="thead">
                       Acciones
                    </x-table.column>
                </x-table.row>
            </x-table.thead>
            <x-table.tbody>
                @foreach($roles as $role)
                   <x-table.row>
                        <x-table.column>
                            {{$role->name}}
                        </x-table.column>
                       <x-table.column>
                           <div class="flex justify-center">

                               <x-button.button variant="primary"
                                                :href="route('users.roles.show', $role->id)"
                               >
                                   Detalles
                               </x-button.button>
                           </div>
                       </x-table.column>
                   </x-table.row>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </x-table.table-wrapper>

    <div class="max-w-xl mx-auto">
        {{$roles->links()}}
    </div>

</x-pages.users.base>
