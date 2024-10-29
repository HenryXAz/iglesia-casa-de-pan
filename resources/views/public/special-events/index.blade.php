<x-layouts.guest>
    <x-cards.container>

        <x-text.title>
            Actividades Especiales
        </x-text.title>


        <x-cards.main-card class="flex gap-2 max-w-5xl flex-col lg:flex-row">

            @foreach($specialEvents as $specialEvent)

                <div class="w-full lg:w-1/2 dark:bg-dark-color-1 bg-light-color-2 p-4">
                    <x-text.subtitle>
                        {{$specialEvent->name}}
                    </x-text.subtitle>
                    <x-text.paragraph>
                        {{$specialEvent->description}}
                    </x-text.paragraph>

                    <div class="mt-4 flex justify-end">
                        <x-button.button
                            :href="route('special-events.public.show', $specialEvent->id)"
                            variant="blue"
                        >
                            Inscribirse
                        </x-button.button>
                    </div>
                </div>

            @endforeach


        </x-cards.main-card>
    </x-cards.container>
</x-layouts.guest>
