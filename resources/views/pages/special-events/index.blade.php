<x-layouts.app>
    <div class="m-4">
        <x-text.title>
            Actividades Especiales
        </x-text.title>

       <x-cards.main-card>
           <div class="flex justify-end">
               <x-button.button
                   :href="route('special-events.create')"
                   variant="danger"
               >
                   Crear nueva actividad
               </x-button.button>
           </div>

          @if (count($events) > 0)
               <x-table.table-wrapper>
                   <x-table.table>
                       <x-table.thead>
                           <x-table.row>
                               <x-table.column type="thead">
                                   Nombre
                               </x-table.column>
                               <x-table.column type="thead">
                                   Descripción
                               </x-table.column>
                               <x-table.column type="thead">
                                    Acciones
                               </x-table.column>
                           </x-table.row>
                       </x-table.thead>
                       <x-table.tbody>
                            @foreach($events as $event)
                                <x-table.row>
                                    <x-table.column>
                                        {{$event->name}}
                                    </x-table.column>
                                    <x-table.column>
                                        {{$event->description}}
                                    </x-table.column>
                                    <x-table.column>

                                        <div class="flex justify-center gap-2">
                                            <x-button.button
                                                :href="route('special-events.edit', $event->id)"
                                            >
                                                Ver
                                            </x-button.button>

                                            @if($event->has_tickets_limit == true)
                                               <x-button.button
                                                   variant="success"
                                                   :href="route('special-events.tracking', $event->id)"
                                               >
                                                    Seguimiento
                                               </x-button.button>
                                            @endif
                                        </div>
                                    </x-table.column>
                                </x-table.row>
                            @endforeach
                       </x-table.tbody>
                   </x-table.table>
               </x-table.table-wrapper>

              <div >
                    {{$events->links()}}
              </div>
              @else
            <x-text.paragraph position="center">
                Aún no hay actividades registradas
            </x-text.paragraph>
           @endif
       </x-cards.main-card>

    </div>
</x-layouts.app>
