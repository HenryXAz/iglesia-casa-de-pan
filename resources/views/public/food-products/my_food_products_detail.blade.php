<x-layouts.guest>

    <x-cards.container>
        <x-text.title>
            Detalles de orden
        </x-text.title>

        <x-cards.main-card class="max-w-2xl">
            <x-text.title>
                Orden de
                {{$order->customer->member->name}}
                {{$order->customer->member->last_name}}
            </x-text.title>

            <div
                class="max-w-xl rounded-md dark:bg-dark-color-1 bg-light-color-2 p-2 mx-auto my-5 flex gap-2 items-center justify-between flex-col md:flex-row">

                @if($order->foodProduct->images->first() == null)
                    <div class="my-5 flex justify-center">
                        <x-icons.food-icon/>
                    </div>
                @else
                    <div class="flex justify-center my-5">

                        <img src="{{asset($order->foodProduct->images->first()->url)}}"
                             class="object-scale-down w-[300px] rounded-md"
                        />
                    </div>
                @endif

                <x-text.subtitle class=" text-sm md:text-sm text-center ">
                    {{$order->foodProduct->title}}
                </x-text.subtitle>
            </div>


            <x-table.table-wrapper>
                <x-table.table>
                    <x-table.tbody>
                        <x-table.row>
                            <x-table.column>
                                <span class="font-bold">Total de unidades</span>
                            </x-table.column>
                            <x-table.column>
                                {{$order->total}}
                            </x-table.column>
                        </x-table.row>
                        <x-table.row>
                            <x-table.column>
                                <span class="font-bold">Precio por unidad</span>
                            </x-table.column>
                            <x-table.column>
                                Q. {{number_format($order->unit_price, 2, '.', ',')}}
                            </x-table.column>
                        </x-table.row>

                        <x-table.row>
                            <x-table.column>
                                <span class="font-bold">Total a pagar</span>
                            </x-table.column>
                            <x-table.column>
                                Q. {{number_format($order->total_order_price, 2, '.', ',')}}
                            </x-table.column>
                        </x-table.row>
                    </x-table.tbody>
                </x-table.table>
            </x-table.table-wrapper>

            <div class="flex justify-center">
                @if($order->has_been_delivered == false)
                    <x-button.button variant="secondary">
                        Aún no entregado
                    </x-button.button>
                @else
                    <x-button.button variant="success">
                        Entregado
                    </x-button.button>
                @endif

            </div>

        </x-cards.main-card>
    </x-cards.container>
</x-layouts.guest>
