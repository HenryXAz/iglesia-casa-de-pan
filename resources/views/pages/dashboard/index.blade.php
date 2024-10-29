<x-layouts.app>
    <x-cards.container>
        <x-text.title>
            Dashboard
        </x-text.title>

        @can('ver dashboard')
            <x-cards.main-card
                class="max-w-md md:max-w-3xl mx-auto flex gap-2 md:justify-around flex-col md:flex-row justify-center items-center">
                <div class="flex flex-col gap-2">
                    <x-text.subtitle class="text-center">
                        Usuarios
                    </x-text.subtitle>
                    <svg viewBox="0 0 16 16" width="100px" class="fill-dark-color-1 dark:fill-light-color-1"
                         xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M8 7C9.65685 7 11 5.65685 11 4C11 2.34315 9.65685 1 8 1C6.34315 1 5 2.34315 5 4C5 5.65685 6.34315 7 8 7Z"></path>
                            <path d="M14 12C14 10.3431 12.6569 9 11 9H5C3.34315 9 2 10.3431 2 12V15H14V12Z"></path>
                        </g>
                    </svg>
                </div>
                <div>
                    <x-table.table-wrapper>
                        <x-table.table>
                            <x-table.tbody>
                                <x-table.row>
                                    <x-table.column>
                                        Total de usuarios
                                    </x-table.column>
                                    <x-table.column>
                                        {{$users}}
                                    </x-table.column>
                                </x-table.row>
                                <x-table.row>
                                    <x-table.column>
                                        Usuarios activos
                                    </x-table.column>
                                    <x-table.column>
                                        {{$activeUsers}}
                                    </x-table.column>
                                </x-table.row>
                                <x-table.row>
                                    <x-table.column>
                                        Usuarios inactivos
                                    </x-table.column>
                                    <x-table.column>
                                        {{$inactiveUsers}}
                                    </x-table.column>
                                </x-table.row>
                                <x-table.row>
                                    <x-table.column>
                                        Usuarios no verificados
                                    </x-table.column>
                                    <x-table.column>
                                        {{$unVerificationUsers}}
                                    </x-table.column>
                                </x-table.row>

                            </x-table.tbody>
                        </x-table.table>
                    </x-table.table-wrapper>
                </div>
            </x-cards.main-card>


            <x-cards.main-card
                class="max-w-md md:max-w-3xl mx-auto flex gap-2 md:justify-around justify-center items-center flex-col md:flex-row">
                <div class="flex flex-col gap-2">
                    <x-text.subtitle class="text-center">
                        Publicaciones
                    </x-text.subtitle>

                    <svg class="fill-dark-color-1 dark:fill-light-color-1" width="100px" version="1.1" id="Layer_1"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         viewBox="0 0 481.894 481.894" xml:space="preserve"><g id="SVGRepo_bgCarrier"
                                                                               stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <g>
                                    <g>
                                        <path
                                            d="M479.7,302.014l-89.059,89.059h91.241v-93.874C481.761,298.978,481.015,300.698,479.7,302.014z"></path>
                                        <path
                                            d="M474.353,0.006H7.529C3.388,0.006,0,3.319,0,7.535v383.537h364.936V296.69c0-4.161,3.368-7.529,7.529-7.529h101.912 c3.044,0,5.794,1.831,6.956,4.647c0.344,0.828,0.512,1.693,0.55,2.556V7.535C481.882,3.319,478.569,0.006,474.353,0.006z"></path>
                                        <path
                                            d="M481.882,296.363v0.836C481.901,296.921,481.894,296.642,481.882,296.363z"></path>
                                    </g>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <polygon points="379.994,304.219 379.994,380.425 456.2,304.219 "></polygon>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path
                                        d="M0,406.131v68.228c0,4.14,3.388,7.529,7.529,7.529h466.823c4.217,0,7.529-3.39,7.529-7.529v-68.228H0z"></path>
                                </g>
                            </g>
                        </g></svg>
                </div>
                <div>
                    <x-table.table-wrapper>
                        <x-table.table>
                            <x-table.tbody>
                                <x-table.row>
                                    <x-table.column>
                                        Total de publicaciones
                                    </x-table.column>
                                    <x-table.column>
                                        {{$posts}}
                                    </x-table.column>
                                </x-table.row>
                                <x-table.row>
                                    <x-table.column>
                                        Publicacones publicadas
                                    </x-table.column>
                                    <x-table.column>
                                        {{$publishedPosts}}
                                    </x-table.column>
                                </x-table.row>
                                <x-table.row>
                                    <x-table.column>
                                        Publicaciones no publicadas
                                    </x-table.column>
                                    <x-table.column>
                                        {{$unPublishedPosts}}
                                    </x-table.column>
                                </x-table.row>
                            </x-table.tbody>
                        </x-table.table>
                    </x-table.table-wrapper>
                </div>
            </x-cards.main-card>

            <div class="max-w-3xl mx-auto flex gap-2 justify-around flex-col md:flex-row">
                <x-cards.main-card class="max-w-md flex flex-col justify-center">
                    <div class="flex justify-center flex-col items-center mx-auto">
                        <x-text.subtitle>
                            Eventos especiales
                        </x-text.subtitle>
                        <svg viewBox="0 0 24 24" width="100px"
                             class="stroke-dark-color-1 dark:stroke-light-color-1 fill-transparent"
                             xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M15 11H4M6 5C4.89543 5 4 5.89543 4 7V19C4 20.1046 4.89543 21 6 21H18C19.1046 21 20 20.1046 20 19V7C20 5.89543 19.1046 5 18 5H15M15 3V7M9 3V7M9 5H12"
                                    stroke-width="1.5" stroke-linecap="round"></path>
                            </g>
                        </svg>
                    </div>
                    <div>
                        <x-table.table-wrapper>
                            <x-table.table>
                                <x-table.tbody>
                                    <x-table.row>
                                        <x-table.column>
                                            Total de eventos
                                        </x-table.column>
                                        <x-table.column>
                                            {{$events}}
                                        </x-table.column>
                                    </x-table.row>
                                    <x-table.row>
                                        <x-table.column>
                                            Eventos activos
                                        </x-table.column>
                                        <x-table.column>
                                            {{$activeEvents}}
                                        </x-table.column>
                                    </x-table.row>
                                </x-table.tbody>
                            </x-table.table>
                        </x-table.table-wrapper>
                    </div>
                </x-cards.main-card>
                <x-cards.main-card class="max-w-md">
                    <div class="flex justify-center flex-col items-center mx-auto">
                        <x-text.subtitle>
                            Ventas de alimentos
                        </x-text.subtitle>
                        <svg viewBox="0 -3.84 122.88 122.88" class="fill-dark-color-1 dark:fill-light-color-1"
                             width="100px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" style="enable-background:new 0 0 122.88 115.21"
                             xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <path
                                        d="M29.03,100.46l20.79-25.21l9.51,12.13L41,110.69C33.98,119.61,20.99,110.21,29.03,100.46L29.03,100.46z M53.31,43.05 c1.98-6.46,1.07-11.98-6.37-20.18L28.76,1c-2.58-3.03-8.66,1.42-6.12,5.09L37.18,24c2.75,3.34-2.36,7.76-5.2,4.32L16.94,9.8 c-2.8-3.21-8.59,1.03-5.66,4.7c4.24,5.1,10.8,13.43,15.04,18.53c2.94,2.99-1.53,7.42-4.43,3.69L6.96,18.32 c-2.19-2.38-5.77-0.9-6.72,1.88c-1.02,2.97,1.49,5.14,3.2,7.34L20.1,49.06c5.17,5.99,10.95,9.54,17.67,7.53 c1.03-0.31,2.29-0.94,3.64-1.77l44.76,57.78c2.41,3.11,7.06,3.44,10.08,0.93l0.69-0.57c3.4-2.83,3.95-8,1.04-11.34L50.58,47.16 C51.96,45.62,52.97,44.16,53.31,43.05L53.31,43.05z M65.98,55.65l7.37-8.94C63.87,23.21,99-8.11,116.03,6.29 C136.72,23.8,105.97,66,84.36,55.57l-8.73,11.09L65.98,55.65L65.98,55.65z"></path>
                                </g>
                            </g></svg>
                    </div>
                    <div>
                        <x-table.table-wrapper>
                            <x-table.table>
                                <x-table.tbody>
                                    <x-table.row>
                                        <x-table.column>
                                            Total ventas de alimentos
                                        </x-table.column>
                                        <x-table.column>
                                            {{$foodProducts}}
                                        </x-table.column>
                                    </x-table.row>
                                    <x-table.row>
                                        <x-table.column>
                                            Ventas de comida activas
                                        </x-table.column>
                                        <x-table.column>
                                            {{$activeFoodProducts}}
                                        </x-table.column>
                                    </x-table.row>
                                    <x-table.row>
                                        <x-table.column>
                                            Ventas de alimentos no autorizadas
                                        </x-table.column>
                                        <x-table.column>
                                            {{$unauthorizedFoodProducts}}
                                        </x-table.column>
                                    </x-table.row>
                                </x-table.tbody>
                            </x-table.table>
                        </x-table.table-wrapper>
                    </div>
                </x-cards.main-card>
            </div>
        @endcan

    </x-cards.container>
</x-layouts.app>
