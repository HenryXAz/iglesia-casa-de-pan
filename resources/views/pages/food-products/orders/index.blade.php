<x-pages.food-products.base>
    <x-cards.container>
        <x-text.title>
            Órdenes
        </x-text.title>

        <x-cards.main-card>

            @if(count($orders) > 0)
                <x-table.table-wrapper>
                    <x-table.table>
                        <x-table.thead>

                        </x-table.thead>
                        <x-table.tbody>
                            @foreach($orders as $order)
                                <x-table.row>
                                    <x-table.column>
                                        {{$order->customer->member->name}}
                                        {{$order->customer->member->last_name}}
                                    </x-table.column>

                                    <x-table.column>
                                        {{$order->foodProduct->title}}
                                    </x-table.column>

                                    <x-table.column>
                                        {{$order->total_order_price}}
                                    </x-table.column>
                                    <x-table.column>
                                        <div class="flex justify-center">
                                            <x-button.button
                                                :href="route('food_orders.show', $order->id)"
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
            @else
                <x-text.paragraph position="center">
                    No hay órdenes por el momento
                </x-text.paragraph>
            @endif
        </x-cards.main-card>
    </x-cards.container>
</x-pages.food-products.base>
