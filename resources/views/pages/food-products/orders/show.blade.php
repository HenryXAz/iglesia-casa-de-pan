<x-pages.food-products.base>
    <x-cards.container>
        <x-text.title>
            Revisar orden
        </x-text.title>

        <x-error-message.error-message for="pay_error" position="center"/>

        <x-success-message.success-message message="delivery_success" position="center" />

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

            <hr class="border border-main-primary my-5"/>

            <x-text.subtitle type="h3">
                Asignación de repartidor
            </x-text.subtitle>

            <div class="my-5">
                <x-form.form :action="route('food_orders.assign_delivery', $order->id)">

                    <x-form.label>
                        Elegir usuario repartidor

                        <x-form.select name="delivery">
                            <x-form.option :value="null">
                                {{__('NO ASIGNADO')}}
                            </x-form.option>

                            @foreach($deliveries as $delivery)
                                <x-form.option value="{{$delivery->id}}"
                                               :selected="$delivery->id == $order->delivery_id"
                                >
                                    {{$delivery->member->name}}
                                    {{$delivery->member->last_name}}
                                </x-form.option>
                            @endforeach

                        </x-form.select>
                    </x-form.label>

                    <x-button.button variant="gray" type="submit">
                        Asignar
                    </x-button.button>
                </x-form.form>
            </div>

            <hr class="border border-main-primary my-5"/>

            <div class="flex gap-2 flex-wrap justify-center flex-col md:flex-row items-center">
                <x-form.form :action="route('food_orders.mark_as_paid', $order->id)"
                             id="paid"
                             x-data="{
                        confirmAction() {
                            const paid = document.getElementById('paid');
                            const response = confirm('¿Está seguro que desea marcarlo como pagado?');

                            if (response) {
                                paid.submit();
                            }
                        }
                    }"

                >
                    <x-button.button
                        @click="confirmAction"
                    >
                        Marcar como pagado
                    </x-button.button>
                </x-form.form>

                @if ($order->has_been_delivered == false)

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
                    <x-button.button disabled variant="success">
                        Entregado
                    </x-button.button>
                @endif

                @if($order->has_been_delivered == false)
                    <x-form.form :action="route('food_orders.mark_as_paid_delivered', $order->id)"
                                 id="paid_delivered"
                                 x-data="{
                        confirmAction() {
                            const paid_delivered = document.getElementById('paid_delivered');
                            const response = confirm('¿Está seguro que desea marcarlo como pagado?');

                            if (response) {
                                paid_delivered.submit();
                            }
                        }
                    }"
                    >
                        <x-button.button
                            @click="confirmAction"
                            variant="blue"
                        >
                            Marcar pagado/entregado
                        </x-button.button>
                    </x-form.form>
                @endif

            </div>

        </x-cards.main-card>
    </x-cards.container>
</x-pages.food-products.base>
