@props(['title' => 'Crear usuario', 'mode' => 'create', 'id' => 0, 'roles' => \Illuminate\Support\Collection::class,
    'user' => \App\Models\User::class,
])

<div class="p-4">
    <x-text.title>
        {{$title}}
    </x-text.title>

    <x-cards.main-card>
        <x-form.form
            action="{{$mode == 'create' ? route('users.store') : route('users.update', $user->id)}}"
        >
            @if($mode == 'edit')
                @method('PUT')
            @endif

            <x-form.label for="identifier">
                Identificardor:
                <x-form.input type="textl" name="identifier" :value="$user->identifier ?? ''"/>
                <x-error-message.error-message for="identifier"/>
            </x-form.label>

            <x-text.paragraph class="mt-5">
                Tipo de usuario:

                @if ($mode == 'edit')
                    <span class="p-2 rounded-md bg-blue-700 text-dark-text">
                    @if ($user->type == 'EMAIL_USER')
                            EMAIL
                        @endif
                        @if($user->type == 'USERNAME')
                            NOMBRE DE USUARIO
                        @endif
                    </span>
                @endif
            </x-text.paragraph>

            <div class="flex items-center flex-row gap-2 my-2 ">

                @if($mode == 'create')

                    <x-form.label for="email">
                        Email
                    </x-form.label>

                    <x-form.radiobutton name="type" id="email" value="EMAIL_USER"
                                        :checked="($mode == 'edit') && ($user->type === 'EMAIL_USER')"
                    />
                    <x-form.label for="username">
                        Nombre de usuario:
                    </x-form.label>

                    <x-form.radiobutton name="type" id="username" value="USERNAME"
                                        :checked="($mode === 'edit') && ($user->type === 'USERNAME')"
                    />

                    <x-error-message.error-message for="type"/>
                @endif
            </div>

            <x-text.paragraph>
                Estado:
            </x-text.paragraph>

            <div class="flex items-center flex-row gap-2 my-2 ">

                <x-form.label for="active">
                    Activo:
                    <x-form.radiobutton name="is_active" id="active" value="1"
                                        :checked="($mode == 'edit') && ($user->is_active == true)"
                    />
                </x-form.label>

                <x-form.label for="inactive">
                    Inactivo:
                    <x-form.radiobutton name="is_active" id="inactive" value="0"
                                        :checked="($mode == 'edit') && ($user->is_active == false)"
                    />
                </x-form.label>

                <x-error-message.error-message for="is_active"/>

            </div>

            <div class="my-6">
                <x-text.subtitle>
                    Asignar roles
                </x-text.subtitle>

                <x-table.table-wrapper class="max-w-xl">
                    <x-table.table>
                        <x-table.thead>
                        </x-table.thead>
                        <x-table.tbody>
                            @foreach($roles as $role)
                                <x-table.row>
                                    <x-table.column>
                                        {{$role->name}}
                                    </x-table.column>
                                    <x-table.column>
                                        <x-form.checkbox
                                            :id="$role->id"
                                            :name="'role_' . $role->name"
                                            :checked="($mode == 'edit' && $user->hasRole($role->name))"
                                        />
                                    </x-table.column>
                                </x-table.row>
                            @endforeach
                        </x-table.tbody>
                    </x-table.table>
                </x-table.table-wrapper>

            </div>


            <hr class="border-light-gold rounded-md border-2 my-5"/>

            <x-text.subtitle>
                Información de miembro
            </x-text.subtitle>

            <x-form.label>
                Nombres:
                <x-form.input type="text" name="name"
                              :value="$user->member->name ?? ''"
                />

                <x-error-message.error-message for="name"/>
            </x-form.label>

            <x-form.label for="last_name">
                Apellidos:
                <x-form.input type="text" name="last_name"
                              :value="$user->member->last_name ?? ''"
                />

                <x-error-message.error-message for="last_name"/>
            </x-form.label>


            <x-text.subtitle type="h3">
                (Información opcional)
            </x-text.subtitle>

            <div class="my-5">
                <div class="flex gap-4">

                    @if($mode == 'create' || $user?->member?->optionalInformation == null)
                        <x-text.paragraph>
                            ¿Va a agregar información opcional?
                        </x-text.paragraph>
                        <x-form.label for="yes">
                            Sí
                            <x-form.radiobutton name="optional_info" id="yes" value="1"
                                                :checked="($mode === 'edit') && ($user?->member?->optionalInformation != null)"
                            />
                        </x-form.label>

                        <x-form.label for="no">
                            No
                            <x-form.radiobutton name="optional_info" id="no" value="0"
                                                :checked="($mode === 'edit') && ($user?->member?->optionalInformation == null)"
                            />
                        </x-form.label>
                    @else
                        <input type="hidden" value="1" name="optional_info"/>
                    @endif
                </div>
            </div>

            <x-form.label for="phone_number">
                Número de teléfono:
                <x-form.input type="text" name="phone_number"
                              :value="$user->member->optionalInformation->phone_number ?? ''"
                />
                <x-error-message.error-message for="phone_number"/>
            </x-form.label>

            <x-form.label for="address">
                Dirección:
                <x-form.input type="text" name="address"
                              :value="$user->member->optionalInformation->address ?? ''"
                />
                <x-error-message.error-message for="address"/>
            </x-form.label>

{{--            @if($mode == 'create')--}}
                <x-form.label for="birthday">
                    Fecha de nacimiento:

                    <x-form.input type="date" name="birthday"

                                  :value="($mode == 'edit' && $user?->member?->optionalInformation?->birthday) ? $user?->member?->optionalInformation?->birthday->format('Y-m-d') : now()->format('Y-m-d')"
{{--                                  value="($mode == 'edit' && $user?->member?->optionalInformation?->birthday) ? $user?->member?->optionalInformation?->birthday->format('m-d-Y') : now()->format('m-d-Y')"--}}
                        {{--                                      value="($mode == 'edit' && $user?->member?->optionalInformation->birthday != null) && $user?->member?->optionalInformation?->birthday->toDateString()"--}}
                    />

                    <x-error-message.error-message for="birthday"/>
                </x-form.label>
{{--            @endif--}}

{{--            @if($mode == 'edit')--}}

{{--                <x-form.label for="birthday">--}}
{{--                    Edad:--}}
{{--                    <x-form.input--}}
{{--                        :value="($user->member?->optionalInformation?->birthday != null) ? $user->member->optionalInformation->birthday->diff(now())->format('%Y años') : 'NO DISPONIBLE'"--}}
{{--                        readonly--}}
{{--                    />--}}
{{--                </x-form.label>--}}

{{--            @endif--}}

            <x-form.label for="dpi">
                DPI:
                <x-form.input type="text" name="dpi"
                              :value="$user->member->optionalInformation->dpi ?? ''"
                />
                <x-error-message.error-message for="dpi"/>
            </x-form.label>

            <div class="flex justify-center my-6">
                <x-button.button type="submit">
                    @if($mode == 'create')
                        {{__('Crear')}}
                    @endif

                    @if($mode == 'edit')
                        {{__('Actualizar')}}
                    @endif

                </x-button.button>
            </div>
        </x-form.form>

    </x-cards.main-card>

</div>
