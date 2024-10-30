@php
    use \App\Services\SpecialEvent\PricesCalculator;
    use \App\Services\SpecialEvent\TicketCalculator;
@endphp

<x-layouts.app>
    <x-cards.container>

        <x-text.title>
            Seguimiento de actividad
        </x-text.title>

        <x-cards.main-card class="max-w-5xl">
            <x-text.subtitle>
                Actividad {{$event->name}}
            </x-text.subtitle>

            <div class="max-w-lg md:max-w-4xl mx-auto dark:bg-dark-color-1 bg-light-color-2 mb-10 mt-5 px-4 py-8 rounded-md flex flex-col lg:flex-row items-center lg:justify-between gap-10 lg:gap-2">
                <x-text.paragraph>
                    Costo total:
                    <span class="font-bold">
                    Q. {{number_format(PricesCalculator::calculateTotalCost($event), 2, '.', ',')}}
                    </span>
                </x-text.paragraph>
                <x-text.paragraph>
                    <span class="font-bold">
                        {{$event->tickets_limit}}
                    </span>
                    tickets Totales
                </x-text.paragraph>
                <x-text.paragraph class=" flex  justify-center items-center gap-2 flex-wrap">
                    Estado de actividad

                    @if($event->is_published == true)
                        <span class="block font-bold p-3 bg-emerald-600 text-dark-text rounded-md">
                            {{__('Públicada')}}
                            </span>
                    @endif

                    @if($event->is_published == false)
                        <span class="block font-bold p-3 bg-main-rose text-dark-text rounded-md">
                            {{__('No Públicada')}}
                        </span>
                    @endif
                </x-text.paragraph>
                <x-text.paragraph>
                    <span class="font-bold">
                        {{TicketCalculator::getAvailableTickets($event)}}
                    </span>
                    Tickets disponibles
                </x-text.paragraph>
            </div>

            <div>
                <x-error-message.error-message for="action_error" />
                <x-success-message.success-message message="action_success" />

                    <x-table.table-wrapper>
                        <x-table.table>
                            <x-table.thead>
                                <x-table.row>
                                    <x-table.column type="thead">
                                       Suscriptor
                                    </x-table.column>
                                    <x-table.column type="thead">
                                        Tickets
                                    </x-table.column>
                                    <x-table.column type="thead">
                                        Total
                                    </x-table.column>
                                    <x-table.column type="thead">
                                        Estado
                                    </x-table.column>
                                </x-table.row>
                            </x-table.thead>
                            <x-table.tbody>
                                @foreach($event->subscriptions as $subscription)
                                    <x-table.row>
                                        <x-table.column>
                                            {{$subscription->user->member->name}}
                                            {{$subscription->user->member->last_name}}
                                        </x-table.column>
                                        <x-table.column>
                                            {{$subscription->tickets}}
                                        </x-table.column>
                                        <x-table.column>
                                            Q. {{
                                            number_format($subscription->tickets_total_price, 2, '.', ',')

                                            }}
                                        </x-table.column>
                                        <x-table.column>
                                            @if($subscription->has_been_paid == false)
                                                <x-table.table-wrapper
                                                >
                                                    <div
                                                        x-data="{
                                                        submit() {
                                                            const response = confirm('Va a confirmar la cancelación de una suscripción. ¿Está seguro de realizar esta acción?');
                                                            const form = document.getElementById('form');

                                                            if (response == true) {
                                                                form.submit();
                                                            } else {
                                                                const hasBeenPaid = document.querySelector('#has_been_paid');
                                                                hasBeenPaid.checked = false;
                                                            }
                                                        }
                                                    }"
                                                    >

                                                        <x-form.form
                                                            :action="route('special-events.mark_as_paid', $subscription->id)"
                                                            id="form"
                                                        >

                                                            <input
                                                                class="w-4 h-4"
                                                                type="checkbox"
                                                                name="has_been_paid"
                                                                id="has_been_paid"
                                                                x-on:change="submit"
                                                            />

                                                        </x-form.form>
                                                    </div>
                                                </x-table.table-wrapper>
                                                @else
                                                <x-text.paragraph>
                                                    CANCELADO
                                                </x-text.paragraph>
                                            @endif
                                        </x-table.column>
                                    </x-table.row>
                                @endforeach
                            </x-table.tbody>
                        </x-table.table>
                    </x-table.table-wrapper>
            </div>

        </x-cards.main-card>
    </x-cards.container>
</x-layouts.app>
