{{--@props(['mode' => 'create', 'specialEvent' => \App\Models\SpecialEvent::class, 'transportationOptions' => \Ramsey\Collection\Collection::class])--}}

@props([
    'mode' => 'create',
    'specialEvent' => \App\Models\SpecialEvent::class,
    'transportationOptions' => \Illuminate\Database\Eloquent\Collection::class,
])


<x-cards.main-card>
    <x-form.form
        :action="($mode == 'create') ? route('special-events.store') : route('special-events.update', $specialEvent->id)"
    >
        @if($mode == 'edit')
            @method('PUT')
        @endif

        <x-form.label for="name">
            Nombre:
            <x-form.input
                name="name"
                id="name"
                placeholder="Nombre"
                :value="($mode == 'edit') ? $specialEvent->name : ''"
            />
            <x-error-message.error-message for="name"/>
        </x-form.label>

        <x-form.label for="description">
            Descripción:
            <x-form.input
                name="description"
                id="description"
                placeholder="Descripción"
                :value="($mode == 'edit') ? $specialEvent->description : ''"
            />
            <x-error-message.error-message for="description"/>
        </x-form.label>

            <x-form.label for="fixed_fee">
                        Cuota Fija (Opcional)
                        <x-form.input
                            name="fixed_fee"
                            id="fixed_fee"
                            placeholder="0.00"
                            :value="($mode ==  'edit') ? $specialEvent->fixed_fee : ''"
                        />

                <x-error-message.error-message for="fixed_fee"/>
            </x-form.label>

        @if($mode == 'edit' && count($specialEvent->transportationOptions) > 0)
            <x-form.label>
                                Seleccionar opción de transporte
                                <x-form.select name="option_selected">
                                    @if($specialEvent->transportation_option_selected == 0)
                                        <x-form.option :value="null">
                                            {{__('AUN NO SELECCIONADO')}}
                                        </x-form.option>
                                    @endif

                                    @foreach($transportationOptions as $option)

                                        <x-form.option :value="$option->id"
                                                       :selected="$specialEvent->transportation_option_selected == $option->id"
                                        >
                                            {{$option->description}}
                                        </x-form.option>

                                    @endforeach


                                </x-form.select>
                            </x-form.label>
                            <x-error-message.error-message for="option_selected" />
            @endif

        @if($mode == 'create')

                            <div
                                x-data="{
                                        isOpen: false,
                                        tickets: 0,
                                        noTicketsLimit() {
                                            this.tickets = 0
                                        },
                                        toggleShowTicketsInput() {
                                               this.isOpen = !this.isOpen

                                               if(!this.isOpen) {
                                                    this.noTicketsLimit()
                                               }
                                        }
                                    }"

                                class="my-5">

                                <x-button.button
                                    variant="success"
                                    @click="toggleShowTicketsInput"
                                    x-text="!isOpen ? 'agregar límite de tickets': 'no agregar límite de tickets'"
                                >

                                </x-button.button>
                                <div
                                    x-show="isOpen"
                                    class="mt-3"
                                >
                                    <x-form.label for="tickets_limit"
                                    >

                                        <x-text.paragraph
                                            x-text="'Limite de tickets'"
                                        >

                                        </x-text.paragraph>
                                        <x-form.input
                                            type="number"
                                            min="0"
                                            name="tickets_limit"

                                            id="tickets_limit"
                                            placeholder="0"
                                            x-model="tickets"
                                        />

                                    </x-form.label>
                                </div>

                            </div>
            @endif


                    <div x-data="{
                                options: {{$mode == 'edit' ? count($specialEvent->transportationOptions) : 0}},
                                items: {{$mode == 'edit' ? json_encode($specialEvent->transportationOptions) : json_encode([])}},
                                addMoreOption() {
                                    this.options++
                                },
                                removeOption() {
                                    this.options--
                                }

                            }" class="mt-10 w-3/4 mx-auto">

                        @if($mode == 'create')
                            <x-text.subtitle class="mb-5">
                                Opciones de Transporte
                            </x-text.subtitle>

                            <div class="flex justify-end my-5">
                                <x-button.button type="button"
                                                 @click="addMoreOption"
                                                 x-text="options > 0 ? '+ Agregar más opciones' : '+ Agregar opcion'"
                                >
                                </x-button.button>
                            </div>
                        @endif

                        <template x-for="(option, index) in options">
                            <div class="bg-light-color-2 dark:bg-dark-color-1 p-2 rounded-md mt-4">

                                @if ($mode == 'create')

                                    <div class="mb-3">
                                        <x-button.button
                                            variant="danger"
                                            @click="removeOption"
                                        >
                                            Remover
                                        </x-button.button>
                                    </div>
                                @endif
                                <x-form.label
                                    x-bind:for="option_description_${index}"
                                >
                                    <x-text.paragraph
                                        x-text="`Descripción de opción de transporte No. ${index + 1}`"
                                    >

                                    </x-text.paragraph>
                                    <x-form.input
                                        x-bind:name="`option_description_${index}`"
                                        x-bind:id="`option_description_${index}`"
                                        placeholder="Descripción"
                                        x-bind:value="items[index].description ?? ''"

                                    />
                                </x-form.label>

                                <x-form.label
                                    x-bind:for="option_tickets_${index}"
                                >
                                    Total de tickets disponibles
                                    <x-form.input
                                        x-bind:name="`option_tickets_${index}`"
                                        x-bind:id="`option_tickets_${index}`"
                                        placeholder="Total tickets"
                                        x-bind:value="items[index].total_tickets ?? ''"
                                    />
                                </x-form.label>

                                <x-form.label x-bind:for="`option_cost_${index}`">
                                    Costo total de transporte:
                                    <x-form.input
                                        x-bind:name="`option_cost_${index}`"
                                        x-bind:id="`option_cost_${index}`"
                                        placeholder="0.00"
                                        x-bind:value="items[index].cost ?? ''"
                                    />
                                </x-form.label>

                            </div>

                        </template>

                    </div>


                    @if($mode == 'edit')

                        <div class="flex gap-2  my-5">

                            <x-text.paragraph class="font-bold">
                                Estado de actividad
                            </x-text.paragraph>

                            <x-form.label for="published">
                                Publicada
                            </x-form.label>

                            <x-form.radiobutton id="published" name="is_published" value="1"
                                :checked="($mode == 'edit' && $specialEvent->is_published == true)"
                            />

                            <x-form.label for="unpublished">
                                No publicada
                            </x-form.label>

                            <x-form.radiobutton id="unpublished" name="is_published" value="0"
                                :checked="($mode == 'edit' && $specialEvent->is_published == false)"
                            />
                        </div>
                        <x-error-message.error-message for="is_published" />
                    @endif



                    <x-button.button
                        type="submit"
                    >
                        @if($mode == 'create')
                           {{__('Crear')}}
                        @endif

                        @if($mode == 'edit')
                            {{__('Actualizar')}}
                        @endif
                    </x-button.button>


    </x-form.form>
</x-cards.main-card>

{{--<x-cards.main-card>--}}
{{--    <x-form.form--}}
{{--        :action="($mode == 'create') ? route('special-events.store') : route('special-events.update')"--}}
{{--    >--}}
{{--        @if ($mode = 'edit')--}}
{{--            @method('PUT')--}}
{{--        @endif--}}




{{--        <x-form.label for="name">--}}
{{--            Nombre:--}}
{{--            <x-form.input--}}
{{--                name="name"--}}
{{--                id="name"--}}
{{--                placeholder="Nombre"--}}
{{--                :value="($mode == 'edit') ? $specialEvent->name : ''"--}}
{{--            />--}}

{{--        </x-form.label>--}}

{{--        <x-form.label for="description">--}}
{{--            Descripción:--}}

{{--            <x-form.input--}}
{{--                name="description"--}}
{{--                id="description"--}}
{{--                placeholder="Descripción"--}}
{{--                class=" h-16 "--}}
{{--                :value="($mode == 'edit') ? $specialEvent->description : ''"--}}
{{--            />--}}
{{--        </x-form.label>--}}

{{--        <x-form.label for="fixed_fee">--}}
{{--            Cuota Fija (Opcional)--}}
{{--            <x-form.input--}}
{{--                name="fixed_fee"--}}
{{--                id="fixed_fee"--}}
{{--                placeholder="0.00"--}}
{{--                :value="($mode ==  'edit') ? $specialEvent->fixed_fee : ''"--}}
{{--            />--}}
{{--        </x-form.label>--}}

{{--        @if($mode == 'edit')--}}
{{--            <x-form.label>--}}
{{--                Seleccionar opción de transporte--}}
{{--                <x-form.select name="option_selected">--}}
{{--                    @if($specialEvent->transportation_option_selected == 0)--}}
{{--                        <x-form.option :value="null">--}}
{{--                            {{__('AUN NO SELECCIONADO')}}--}}
{{--                        </x-form.option>--}}
{{--                    @endif--}}

{{--                    @foreach($transportationOptions as $option)--}}

{{--                        <x-form.option :value="$option->id"--}}
{{--                                       :selected="$specialEvent->transportation_option_selected == $option->id"--}}
{{--                        >--}}
{{--                            {{$option->description}}--}}
{{--                        </x-form.option>--}}

{{--                    @endforeach--}}


{{--                </x-form.select>--}}
{{--            </x-form.label>--}}
{{--            <x-error-message.error-message for="option_selected" />--}}
{{--        @endif--}}

{{--        @if($mode == 'create')--}}
{{--            <div--}}
{{--                x-data="{--}}
{{--                        isOpen: false,--}}
{{--                        tickets: 0,--}}
{{--                        noTicketsLimit() {--}}
{{--                            this.tickets = 0--}}
{{--                        },--}}
{{--                        toggleShowTicketsInput() {--}}
{{--                               this.isOpen = !this.isOpen--}}

{{--                               if(!this.isOpen) {--}}
{{--                                    this.noTicketsLimit()--}}
{{--                               }--}}
{{--                        }--}}
{{--                    }"--}}

{{--                class="my-5">--}}

{{--                <x-button.button--}}
{{--                    variant="success"--}}
{{--                    @click="toggleShowTicketsInput"--}}
{{--                    x-text="!isOpen ? 'agregar límite de tickets': 'no agregar límite de tickets'"--}}
{{--                >--}}

{{--                </x-button.button>--}}
{{--                <div--}}
{{--                    x-show="isOpen"--}}
{{--                    class="mt-3"--}}
{{--                >--}}
{{--                    <x-form.label for="tickets_limit"--}}
{{--                    >--}}

{{--                        <x-text.paragraph--}}
{{--                            x-text="'Limite de tickets'"--}}
{{--                        >--}}

{{--                        </x-text.paragraph>--}}
{{--                        <x-form.input--}}
{{--                            type="number"--}}
{{--                            min="0"--}}
{{--                            name="tickets_limit"--}}

{{--                            id="tickets_limit"--}}
{{--                            placeholder="0"--}}
{{--                            x-model="tickets"--}}
{{--                        />--}}

{{--                    </x-form.label>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            @endif--}}


{{--        <div x-data="{--}}
{{--                    options: {{$mode == 'edit' ? count($specialEvent->transportationOptions) : 0}},--}}
{{--                    items: {{$mode == 'edit' ? json_encode($specialEvent->transportationOptions) : json_encode([])}},--}}
{{--                    addMoreOption() {--}}
{{--                        this.options++--}}
{{--                    },--}}
{{--                    removeOption() {--}}
{{--                        this.options----}}
{{--                    }--}}

{{--                }" class="mt-10 w-3/4 mx-auto">--}}
{{--            <x-text.subtitle class="mb-5">--}}
{{--                Opciones de Transporte--}}
{{--            </x-text.subtitle>--}}

{{--            @if($mode == 'create')--}}

{{--                <div class="flex justify-end my-5">--}}
{{--                    <x-button.button type="button"--}}
{{--                                     @click="addMoreOption"--}}
{{--                                     x-text="options > 0 ? '+ Agregar más opciones' : '+ Agregar opcion'"--}}
{{--                    >--}}
{{--                    </x-button.button>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            <template x-for="(option, index) in options">--}}
{{--                <div class="bg-light-color-2 dark:bg-dark-color-1 p-2 rounded-md mt-4">--}}

{{--                    @if ($mode == 'create')--}}

{{--                        <div class="mb-3">--}}
{{--                            <x-button.button--}}
{{--                                variant="danger"--}}
{{--                                @click="removeOption"--}}
{{--                            >--}}
{{--                                Remover--}}
{{--                            </x-button.button>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <x-form.label--}}
{{--                        x-bind:for="option_description_${index}"--}}
{{--                    >--}}
{{--                        <x-text.paragraph--}}
{{--                            x-text="`Descripción de opción de transporte No. ${index + 1}`"--}}
{{--                        >--}}

{{--                        </x-text.paragraph>--}}
{{--                        <x-form.input--}}
{{--                            x-bind:name="`option_description_${index}`"--}}
{{--                            x-bind:id="`option_description_${index}`"--}}
{{--                            placeholder="Descripción"--}}
{{--                            x-bind:value="items[index].description ?? ''"--}}

{{--                        />--}}
{{--                    </x-form.label>--}}

{{--                    <x-form.label--}}
{{--                        x-bind:for="option_tickets_${index}"--}}
{{--                    >--}}
{{--                        Total de tickets disponibles--}}
{{--                        <x-form.input--}}
{{--                            x-bind:name="`option_tickets_${index}`"--}}
{{--                            x-bind:id="`option_tickets_${index}`"--}}
{{--                            placeholder="Total tickets"--}}
{{--                            x-bind:value="items[index].total_tickets ?? ''"--}}
{{--                        />--}}
{{--                    </x-form.label>--}}

{{--                    <x-form.label x-bind:for="`option_cost_${index}`">--}}
{{--                        Costo total de transporte:--}}
{{--                        <x-form.input--}}
{{--                            x-bind:name="`option_cost_${index}`"--}}
{{--                            x-bind:id="`option_cost_${index}`"--}}
{{--                            placeholder="0.00"--}}
{{--                            x-bind:value="items[index].cost ?? ''"--}}
{{--                        />--}}
{{--                    </x-form.label>--}}

{{--                </div>--}}

{{--            </template>--}}

{{--        </div>--}}


{{--        @if($mode == 'edit')--}}

{{--            <div class="flex gap-2  my-5">--}}

{{--                <x-text.paragraph class="font-bold">--}}
{{--                    Estado de actividad--}}
{{--                </x-text.paragraph>--}}

{{--                <x-form.label for="published">--}}
{{--                    Publicada--}}
{{--                </x-form.label>--}}

{{--                <x-form.radiobutton id="published" name="is_published" value="1"/>--}}

{{--                <x-form.label for="unpublished">--}}
{{--                    No publicada--}}
{{--                </x-form.label>--}}

{{--                <x-form.radiobutton id="unpublished" name="is_published" value="0"/>--}}
{{--            </div>--}}
{{--        @endif--}}


{{--        <x-button.button--}}
{{--            type="submit"--}}
{{--        >--}}
{{--            Crear--}}
{{--        </x-button.button>--}}

{{--    </x-form.form></x-cards.main-card>--}}
