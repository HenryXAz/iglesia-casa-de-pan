<x-layouts.guest>
    <x-cards.container>
        <x-text.title>
            Mis órdenes
        </x-text.title>

        <x-cards.main-card class="flex gap-2 max-w-5xl flex-col lg:flex-row">
            @if(count(Auth::user()->orders) > 0)
                @foreach(Auth::user()->orders as $order)
                    <div class="w-full lg:w-1/2 dark:bg-dark-color-1 bg-light-color-2 p-4 rounded-md">
                        <x-text.paragraph position="center">
                            {{$order->foodProduct->title}}
                        </x-text.paragraph>

                        @if($order->foodProduct->images->first() == null)
                            --}}
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

                        <x-text.paragraph position="center" class="mt-5">
                            Unidades ordenadas
                            <span class="font-bold">
                            {{$order->total}}
                        </span>
                        </x-text.paragraph>

                        <div class="flex">
                            <x-button.button
                                :href="route('food_products.public.my_food_product_detail', $order->id)"
                            >
                                Detalles
                            </x-button.button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="w-full mx-auto">
                    <x-text.paragraph position="center">
                        No hay órdenes pendientes
                    </x-text.paragraph>
                </div>
            @endif

        </x-cards.main-card>

    </x-cards.container>
</x-layouts.guest>
