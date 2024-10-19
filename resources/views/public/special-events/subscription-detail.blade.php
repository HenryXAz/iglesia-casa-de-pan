<x-layouts.guest>
    <x-cards.container>

        <x-cards.main-card class="max-w-xl">
            <x-text.title position="center">
                {{$subscription->event->name}}
            </x-text.title>


            <div class="w-full flex flex-col md:flex-row items-center md:items-start  justify-between  rounded-md dark:bg-dark-color-1 bg-light-color-2 p-4 mt-5">
                <x-text.paragraph>
                    Número de tickets:
                    <span class="font-bold">
                        {{$subscription->tickets}}
                    </span>
                </x-text.paragraph>

                <x-text.paragraph>
                    Total:
                    <span class="font-bold">
                        Q. {{number_format($subscription->tickets_total_price, 2, '.', ',')}}
                    </span>
                </x-text.paragraph>

            </div>


            <div class="flex justify-center mt-5">

                @if($subscription->has_been_paid == true)
                    <x-button.button
                        variant="success"
                        disabled
                    >
                        SUSCRIPCIÓN PAGADA
                    </x-button.button>
                @endif

                @if($subscription->has_been_paid == false)
                        <x-button.button
                            variant="secondary"
                            disabled
                        >
                            PENDIENTE DE PAGAR
                        </x-button.button>
                @endif
            </div>
        </x-cards.main-card>

    </x-cards.container>
</x-layouts.guest>
