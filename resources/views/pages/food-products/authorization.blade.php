<x-layouts.app>
    <x-cards.container>
        <x-cards.main-card class="max-w-xl">
            <x-text.title position="center">
                {{$foodProduct->title}}
            </x-text.title>

            <div class="my-5 flex justify-center">
                @if($foodProduct->images->first() == null)
                    <x-icons.food-icon />
                @else
                    <img src="{{asset($foodProduct->images->first()->url)}}"
                        class="object-scale-down w-[300px] rounded-md"

                    />
                @endif
            </div>

            <x-text.paragraph>
                {{$foodProduct->description}}
{{--                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vehicula suscipit risus, ac rutrum ex sagittis id. Integer egestas, nibh et gravida feugiat, ex lectus accumsan erat, eget eleifend elit ipsum ut sapien. In tincidunt ornare consequat. Mauris condimentum condimentum nibh, nec aliquam enim volutpat at. Duis in rutrum magna. Suspendisse aliquet vitae tortor in mollis. Donec vestibulum vitae diam ac fringilla. Quisque tincidunt et ex id aliquet. Vestibulum ut condimentum ex. Proin sit amet tincidunt nisi, auctor iaculis purus.--}}
            </x-text.paragraph>

            <div class="flex justify-center gap-4 flex-col bg-color-2 dark:bg-dark-color-1 p-2 rounded-md mt-5 ">
                <div class="flex justify-center gap-4 flex-col md:flex-row">
                    <x-text.paragraph>
                        Costo
                        <span class="block">
                        Q. {{number_format($foodProduct->cost, 2, '.', ',')}}
                    </span>
                    </x-text.paragraph>

                    <x-text.paragraph>
                        Retorno total
                        <span class="block">
                        Q. {{number_format($foodProduct->total_profits, 2, '.', ',')}}
                        </span>
                    </x-text.paragraph>
                </div>

                    <div class="flex justify-center gap-4 flex-col md:flex-row">
                    <x-text.paragraph >
                        Unidades totales
                        <span class="block">
                        {{$foodProduct->stock}}
                    </span>
                    </x-text.paragraph>

                    <x-text.paragraph>
                        Precio por unidad
                        <span class="block">
                    Q. {{number_format($foodProduct->price_per_unit, 2, '.', ',')}}
                    </span>
                    </x-text.paragraph>
                </div>

            </div>

            <div class="mt-5">
                <x-form.form :action="route('food_products.authorize_food_product.confirm', $foodProduct->id)">
                    <x-button.button
                        type="submit"
                        variant="success"
                    >
                        {{__("Autorizar")}}
                    </x-button.button>
                </x-form.form>
            </div>
        </x-cards.main-card>
    </x-cards.container>
</x-layouts.app>
