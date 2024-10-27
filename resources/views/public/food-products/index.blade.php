<x-layouts.guest>
    <x-cards.container>
        <x-text.title>
            Alimentos disponibles
        </x-text.title>


        <x-cards.main-card class="flex gap-2 max-w-5xl flex-col lg:flex-row">
            @foreach($foodProducts as $foodProduct)
                <div class="w-full lg:w-1/2 dark:bg-dark-color-1 bg-light-color-2 p-4 rounded-md">
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


                    <x-button.button
                        :href="route('food_products.public.show', $foodProduct->id)"
                    >
                        Ordenar
                    </x-button.button>
                </div>
            @endforeach

        </x-cards.main-card>
    </x-cards.container>
</x-layouts.guest>
