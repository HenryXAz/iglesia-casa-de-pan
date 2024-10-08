@php
use \App\Enums\Users\TypeUser;
use \App\Enums\Users\UserState;
@endphp

<x-pages.users.base>

    <x-cards.main-card class="max-w-xl">
        <x-success-message.success-message
            message="creation_success"
            position="center"
        />

        <x-text.title position="center">
            <span class="font-bold">
            {{$user->identifier}}
            </span>
        </x-text.title>

        <x-text.paragraph class="mt-5 mb-2">
            Roles Asignados:
        </x-text.paragraph>

        <x-list.list
            :items="$user->roles"
            content-name="name"
        />

        <x-text.paragraph
            class="mt-5"
        >
            Tipo de usuario:
            <span class="font-bold">
                @if($user->type == TypeUser::EMAIL_USER)
                    {{__('Correo Electrónico')}}
                @endif

                @if($user->type == TypeUser::USERNAME)
                    {{__('Nombre de Usuario')}}
                @endif
            </span>
        </x-text.paragraph>


        <x-text.paragraph
            class="mt-5"
        >
            ¿Está activo?
            @if($user->state == UserState::ACTIVE)

                <span class="p-2 bg-emerald-700 text-dark-text rounded-md">
                    Si
            </span>
            @endif

            @if($user->state == UserState::INACTIVE)
                <span class="p-2 bg-main-rose text-dark-text rounded-md">
                    No
                </span>

            @endif
        </x-text.paragraph>

        <x-text.paragraph class="mt-5">
            Usuario verificado en
            <span class="font-bold">
                @if($user->verificationState !== null)
                  {{$user->verificationState->format('d-m-Y')}}
                @else
                   {{__('Aún no se verifica')}}
                    @endif

            </span>
        </x-text.paragraph>

        @if($user->type == TypeUser::USERNAME)
            <div x-data="{
                        link: document.getElementById('clip'),
                        isCopied: false,
                        copy() {
                            navigator.clipboard.writeText(this.link.value)

                            this.isCopied = true;
                            setTimeout(() => {
                                this.isCopied = false;
                            }, 3000)

                        }
                    }"
                class="mt-5"
            >
                <input type="hidden"
                       name="clip"
                       id="clip"
                       value="{{
                                    \Illuminate\Support\Facades\URL::temporarySignedRoute(
                                        'restore.email-password.view',
                                        now()->addMinutes(30),
                                        [
                                            'id' => $user->identifier,
                                        ]
                                    )

                               }}"
                />

                <x-button.button type="button" x-on:click="copy"
                                 variant="secondary"
                >
                    <p
                        x-text="(!isCopied) ? 'Copiar enlace de verificación / restauración' : '¡¡Copiado!!'"
                    >

                    </p>
                </x-button.button>
            </div
            @endif

        <div>
            <hr class="border-main-light-primary my-5" />

            <x-text.subtitle>
                Información de miembro
            </x-text.subtitle>


            <x-text.paragraph class="mt-5">
                Nombres: <span class="font-bold">{{$user->member->name}}</span>
            </x-text.paragraph>

            <x-text.paragraph class="mt-5">
                Apellidos: <span class="font-bold">{{$user->member->last_name}}</span>
            </x-text.paragraph>

            @if($user->member?->optionalInformation !== null)

                <x-text.paragraph class="mt-5">
                    Teléfono: <span class="font-bold">{{$user->member->optionalInformation->phone_number}}</span>
                </x-text.paragraph>

                <x-text.paragraph class="mt-5">
                    Dirección: <span class="font-bold">{{$user->member->optionalInformation->address}}</span>
                </x-text.paragraph>

                <x-text.paragraph class="mt-5">
                   Edad: <span class="font-bold">
                        {{$user->member->optionalInformation->birthday->diff(now())->format('%Y años')}}
                    </span>
                </x-text.paragraph>

                <x-text.paragraph class="mt-5">
                    DPI: <span class="font-bold">{{$user->member->optionalInformation->dpi}}</span>
                </x-text.paragraph>
            @endif

        </div>

    </x-cards.main-card>

</x-pages.users.base>
