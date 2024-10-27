<x-pages.food-products.base>
    <x-cards.container>
        <x-text.title>
            Mis entregas
        </x-text.title>

        <x-cards.main-card>
            @if(count(Auth::user()->deliveries) > 0)
                <x-table.table-wrapper>
                    <x-table.table>
                        <x-table.thead>
                            <x-table.row>
                                <x-table.column type="thead">
                                    Destinatario
                                </x-table.column>
                                <x-table.column type="thead">
                                    Acciones
                                </x-table.column>
                            </x-table.row>
                        </x-table.thead>
                        <x-table.tbody>
                            @foreach(Auth::user()->deliveries as $order)
                                <x-table.row>
                                    <x-table.column>
                                        {{$order->customer->member->name}}
                                        {{$order->customer->member->last_name}}
                                    </x-table.column>
                                    <x-table.column>
                                        <div class="flex justify-center">
                                            <x-button.button
                                                :href="route('food_deliveries.show', $order->id)"
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
            @else
                <x-text.paragraph position="center">
                    No hay órdenes para entregar
                </x-text.paragraph>
            @endif
        </x-cards.main-card>
    </x-cards.container>
</x-pages.food-products.base>
