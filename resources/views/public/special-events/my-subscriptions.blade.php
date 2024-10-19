<x-layouts.guest>
    <x-cards.container>
        <x-text.title>
            Mis suscripciones
        </x-text.title>

        <x-cards.main-card class="flex gap-2  max-w-5xl flex-col md:flex-row">
            @foreach($subscriptions as $subscription  )
                <div class="w-full rounded-md lg:w-1/2 dark:bg-dark-color-1 bg-light-color-2 p-4">
                    <x-text.subtitle class=" text-center ">
                        {{$subscription->event->name}}
                    </x-text.subtitle>

                    <div class="flex justify-between flex-col md:flex-row items-center">
                        <x-text.paragraph class="mb-5 md:mb-0">
                            tickets:
                            <span class="font-bold">
                            {{$subscription->tickets}}
                            </span>
                        </x-text.paragraph>

                        <x-button.button
                            :href="route('special-events.public.subscription_detail', $subscription->id)"
                        >
                            Detalles
                        </x-button.button>
                    </div>
                </div>
            @endforeach
        </x-cards.main-card>
    </x-cards.container>
</x-layouts.guest>
