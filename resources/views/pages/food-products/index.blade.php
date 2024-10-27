<x-pages.food-products.base>
    <x-cards.container>
        <x-text.title>
            Venta de alimentos
        </x-text.title>

        <x-success-message.success-message message="finalized_success" position="center" />

        <div class="flex justify-end mt-5">
            <x-button.button
                variant="danger"
                :href="route('food_products.create')"
            >
                nuevo
            </x-button.button>
        </div>

        <x-cards.main-card>
            @if(count(Auth::user()->foodProducts) > 0)
                <x-table.table-wrapper>
                    <x-table.table>
                        <x-table.thead>
                            <x-table.row>
                                <x-table.column type="thead">
                                    Título
                                </x-table.column>
                                <x-table.column type="thead">
                                    Recaudación
                                </x-table.column>
                                <x-table.column type="thead">
                                    Acciones
                                </x-table.column>
                            </x-table.row>
                        </x-table.thead>
                        <x-table.tbody>
                            @foreach(Auth::user()->foodProducts as $foodProduct)
                                <x-table.row>
                                    <x-table.column>
                                        {{$foodProduct->title}}
                                    </x-table.column>
                                    <x-table.column>
                                        Q. {{number_format($foodProduct->total_real_profits, 2, '.', ',') ?? 0.00 }}
                                    </x-table.column>
                                    <x-table.column>
                                        <div class="flex justify-center">
                                            <x-button.button
                                                :href="route('food_products.view', $foodProduct->id)"
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
                    Aún no hay venta de alimentos
                </x-text.paragraph>
            @endif
        </x-cards.main-card>

    </x-cards.container>
</x-pages.food-products.base>
