<x-layouts.guest>
       <x-cards.container>
            <x-success-message.success-message message="creation_success" position="center"/>

            <x-error-message.error-message for="creation_error" position="center"/>

        <x-cards.main-card class="max-w-xl">
            <x-text.title position="center">
                {{$foodProduct->title}}
            </x-text.title>

            @if($foodProduct->images->first() == null)
                <div class="my-5 flex justify-center">
                    <x-icons.food-icon />
                </div>
            @else
                <div class="flex justify-center my-5">

                    <img src="{{asset($foodProduct->images->first()->url)}}"
                         class="object-scale-down w-[300px] rounded-md"
                    />
                </div>
            @endif

            <x-text.paragraph>
                {{$foodProduct->description}}
            </x-text.paragraph>

            <x-table.table-wrapper>
                <x-table.table>
                    <x-table.thead>

                    </x-table.thead>

                    <x-table.tbody>
                        <x-table.row>
                            <x-table.column>
                                Precio por unidad
                            </x-table.column>
                            <x-table.column>
                                <span class="font-bold">Q. {{number_format($foodProduct->price_per_unit, 2, '.', ',')}}</span>
                            </x-table.column>
                        </x-table.row>
                        <x-table.row>
                            <x-table.column>
                                Unidades disponibles
                            </x-table.column>
                            <x-table.column>
                                <span class="font-bold">{{$foodProduct->stock}}</span>
                            </x-table.column>
                        </x-table.row>
                    </x-table.tbody>
                </x-table.table>
            </x-table.table-wrapper>

            <div
                x-data="{
                    totalUnits: 0,
                    totalToPay: 0.00,
                    pricePerUnit: {{$foodProduct->price_per_unit}},
                    calculateTotal() {
                        this.totalToPay = Math.round(((this.totalUnits * this.pricePerUnit) + Number.EPSILON) * 100) /100;
                    },
                    makeOrder(e) {
                        const form = document.getElementById('form');
                        const response = confirm('¿Esta seguro de hacer la orden?');

                        if (response) {
                            form.submit();
                        }

                    }
                }"
            >
                <x-form.form
                    id="form"
                    @submit.prevent="makeOrder"
                    :action="route('food_products.public.make_order', $foodProduct->id)"
                >
                    <x-form.label for="total_units">
                        Unidades a ordenar:
                        <x-form.input
                            type="number"
                            name="total_units"
                            id="total_units"
                            min="0"
                            max="{{$foodProduct->stock}}"
                            x-model="totalUnits"
                            @change="calculateTotal"
                            @keyup="calculateTotal"
                        />
                        <x-error-message.error-message for="total_units"/>

                    </x-form.label>

                    <x-form.label for="total_to_pay">
                        Total a pagar

                        <x-text.paragraph class="flex gap-2 items-center">
                            Q.
                            <x-form.input
                                name="total_to_pay"
                                id="total_to_pay"
                                x-model="totalToPay"
                                readonly
                            />
                        </x-text.paragraph>
                    </x-form.label>

                    <div class="mt-5">
                        <x-button.button
                            type="submit"
                        >
                            Hacer orden
                        </x-button.button>
                    </div>
                </x-form.form>
            </div>

        </x-cards.main-card>
    </x-cards.container>
</x-layouts.guest>
