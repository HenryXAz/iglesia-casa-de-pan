<x-pages.food-products.base>
    <x-cards.container>
        <x-cards.main-card class="max-w-xl">
            <x-text.subtitle>
                Orden de {{$order->customer->member->name}}
                {{$order->customer->member->last_name}}
            </x-text.subtitle>

            <x-success-message.success-message message="delivery_success" position="center"/>

            <x-text.paragraph class="mb-5 mt-3">
                Dirección:

                <span class="font-bold">

                @if($order->customer->member->optionalInformation !== null)
                        {{$order->customer->member->optionalInformation->address}}
                    @else
                        No especificado
                    @endif
                </span>
            </x-text.paragraph>

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
                         alt="{{$order->title}}"/>
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

            @if($order->has_been_delivered == false)
                <x-form.form :action="route('food_orders.mark_as_delivered', $order->id)"
                             id="delivered"
                             x-data="{
                        confirmAction() {
                            const delivered = document.getElementById('delivered');
                            const response = confirm('¿Está seguro que desea marcarlo como pagado?');

                            if (response) {
                                delivered.submit();
                            }
                        }
                    }"
                >
                    <x-button.button variant="secondary" @click="confirmAction">
                        Marcar como entregado
                    </x-button.button>
                </x-form.form>
                @else
                <x-button.button variant="success" disabled>
                    Entregado
                </x-button.button>
                @endif
        </x-cards.main-card>
    </x-cards.container>
</x-pages.food-products.base>
