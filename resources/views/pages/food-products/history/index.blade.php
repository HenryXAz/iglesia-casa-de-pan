<x-pages.food-products.base>
    <x-cards.container>
        <x-text.title>
            Hitorial
        </x-text.title>

        <x-cards.main-card>
            @if(count($foodProducts) > 0)
                <x-table.table-wrapper>
                    <x-table.table>
                        <x-table.thead>
                            <x-table.column type="thead">
                                Título
                            </x-table.column>
                            <x-table.column type="thead">
                                Total recaudado
                            </x-table.column>
                            <x-table.column type="thead">
                                Acciones
                            </x-table.column>
                        </x-table.thead>
                        <x-table.tbody>
                            @foreach($foodProducts as $foodProduct)
                               <x-table.row>
                                   <x-table.column>
                                       {{$foodProduct->title}}
                                   </x-table.column>
                                  <x-table.column>
                                      {{number_format($foodProduct->total_real_profits, 2, '.', ',')}}
                                  </x-table.column>
                                   <x-table.column>
                                       <div class="flex justify-center">
                                           <x-button.button
                                                :href="route('food_products_history.show', $foodProduct->id)"
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

                <div class="flex justify-center max-w-2xl">
                    {{$foodProducts->links()}}
                </div>
            @else
                <x-text.paragraph position="center">
                    Aún no hay registros en el historial
                </x-text.paragraph>
            @endif
        </x-cards.main-card>
    </x-cards.container>
</x-pages.food-products.base>
