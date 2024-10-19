@php
    use \App\Services\SpecialEvent\TicketCalculator;
    use \App\Services\SpecialEvent\PricesCalculator;

    $tickets_limit = TicketCalculator::getAvailableTickets($specialEvent);
    $ticketPrice = number_format(PricesCalculator::calcultateTicketCost($specialEvent), 2, '.', ',');
@endphp

{{--@if($errors->any())--}}
{{--    @foreach($errors->all() as $error)--}}
{{--        {{$error}}--}}
{{--    @endforeach--}}
{{--@endif--}}

<x-layouts.guest>
    <x-cards.container>

        <x-error-message.error-message for="creation_error"/>

        <x-success-message.success-message message="creation_success" />

        <x-cards.main-card class="max-w-xl">
            <x-text.title>
                {{$specialEvent->name}}
            </x-text.title>

            <x-text.paragraph>
                {{$specialEvent->description}}
            </x-text.paragraph>


            <div
                class="max-w-lg md:max-w-4xl mx-auto dark:bg-dark-color-1 bg-light-color-2 mb-10 mt-5 px-4 py-8 rounded-md flex flex-col lg:flex-row items-center lg:justify-between gap-10 lg:gap-2">
                <x-text.paragraph>
                    <span class="font-bold">
{{--                    {{TicketCalculator::getAvailableTickets($specialEvent)}}--}}
                        {{$tickets_limit}}
                    </span>
                    Tickets disponibles
                </x-text.paragraph>

                <x-text.paragraph>
                    Costo por ticket:
                    <span class="font-bold">
                    Q. {{
//                    number_format(round(PricesCalculator::calculateTotalCost($specialEvent) / $specialEvent->tickets_limit), 2, '.', ',')
                        number_format(PricesCalculator::calcultateTicketCost($specialEvent), 2, '.', ',')
                    }}
                    </span>
                </x-text.paragraph>

            </div>

            <div
                x-data="{
                    limit:{{json_encode($tickets_limit)}},
                    tickets: 0,
               }"
            >
                <x-form.form
                    :action="route('special-events.public.subscription', $specialEvent->id)"
                >
                    <x-form.label for="total_tickets">
                        Número de tickets a reservar:
                        <x-form.input
                            type="number"
                            x-bind:max="limit"
                            min="0"
                            name="total_tickets"
                            id="total_tickets"
                            x-model="tickets"
                            placeholder="0"
                        />
                        <x-error-message.error-message for="total_tickets"/>

                    </x-form.label>

                    <x-form.label for="total_to_pay">
                        Total a pagar

                        <span class="flex gap-2 items-center">
                                Q. <x-form.input
                                name="total_to_pay"
                                id="total_to_pay"
                                x-bind:value="tickets * {{$ticketPrice}}"
                                readonly
                            />
                            </span>
                    </x-form.label>

                    <div class="flex mt-5">

                        <x-button.button
                            type="submit"

                        >
                            Reservar
                        </x-button.button>
                    </div>
                </x-form.form>
            </div>
        </x-cards.main-card>

    </x-cards.container>
</x-layouts.guest>
