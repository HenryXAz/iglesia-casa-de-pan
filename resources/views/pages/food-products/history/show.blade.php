<x-pages.food-products.base>

    <x-cards.container>
        @if ($foodProduct->is_published == true)
            <x-cards.main-card class="max-w-2xl">
                <x-text.title>
                    {{$foodProduct->title}}
                </x-text.title>

                <div class="flex justify-center my-4">
                    @if($foodProduct->images->first() === null)
                        <x-icons.food-icon />
                    @else
                        <img src="{{asset($foodProduct->images->first()->url)}}"
                             class="object-scale-down w-[300px] rounded-md"

                        />
                    @endif


                </div>


                <div class="my-5 flex flex-col md:flex-row justify-start gap-2">
                    <x-text.paragraph>
                        <span class="font-bold">
                            Creado el
                        </span>
                        {{$foodProduct->created_at->format('d-m-Y')}}
                    </x-text.paragraph>
                    <x-text.paragraph>
                        <span class="font-bold">
                            Autorizado el
                        </span>
                        {{$foodProduct->updated_at->format('d-m-Y')}}
                    </x-text.paragraph>
                </div>

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
                                    Costo
                                </x-table.column>

                                <x-table.column>
                                    <span class="font-bold">Q. {{number_format($foodProduct->cost, 2, '.', ',')}}</span>
                                </x-table.column>
                            </x-table.row>
                            <x-table.row>
                                <x-table.column>
                                    Retorno esperado
                                </x-table.column>
                                <x-table.column>
                                    <span class="font-bold">
                                        Q. {{number_format($foodProduct->total_profits, 2, '.', ',')}}
                                    </span>
                                </x-table.column>
                            </x-table.row>
                            <x-table.row>
                                <x-table.column>
                                    Retorno total
                                </x-table.column>
                                <x-table.column>
                                    <span class="font-bold">Q. {{number_format($foodProduct->total_real_profits, 2, '.', ',')}}</span>
                                </x-table.column>
                            </x-table.row>
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
                                    Unidades no vendidas
                                </x-table.column>
                                <x-table.column>
                                    <span class="font-bold">{{$foodProduct->stock}}</span>
                                </x-table.column>
                            </x-table.row>
                        </x-table.tbody>
                    </x-table.table>
                </x-table.table-wrapper>

{{--                <div class="mt-5 ">--}}
{{--                    <x-form.form :action="route('food_products.mark_as_finalized', $foodProduct->id)"--}}
{{--                                 id="finalized_form"--}}
{{--                                 x-data="{--}}
{{--                            confirmAction() {--}}
{{--                                const form = document.getElementById('finalized_form');--}}
{{--                                const response = confirm('¿Está seguro que quiere finalizar esta actividad?');--}}

{{--                                if (response) {--}}
{{--                                    form.submit();--}}
{{--                                }--}}
{{--                            }--}}
{{--                        }"--}}
{{--                    >--}}

{{--                        <x-button.button--}}
{{--                            @click="confirmAction"--}}
{{--                        >--}}
{{--                            Finalizar--}}
{{--                        </x-button.button>--}}
{{--                    </x-form.form>--}}

{{--                </div>--}}

            </x-cards.main-card>
        @else

            <x-cards.main-card class="max-w-xl">
                <x-text.title>
                    {{$foodProduct->title}}
                </x-text.title>

                <div class="flex justify-center">
                    <x-button.button
                        variant="danger"
                        disabled>
                        Aún no autorizado
                    </x-button.button>
                </div>
                <x-text.paragraph>
                    Esta actividad de venta de alimentos aún no ha sido autorizada, espere a que algún administrador autorize
                    la actividad para poder darle seguimiento.
                </x-text.paragraph>
            </x-cards.main-card>

        @endif

    </x-cards.container>
</x-pages.food-products.base>
