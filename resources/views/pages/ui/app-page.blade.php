<x-layouts.app>

    <div class="p-4">
        <x-text.title>
            Home
        </x-text.title>

        <x-cards.main-card>
            <x-text.subtitle type="h2">
                Subtitle h2
            </x-text.subtitle>

            <x-text.subtitle type="h3">
                Subtitle h3
            </x-text.subtitle>

            <x-text.paragraph>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci ea fugit minus nostrum soluta tenetur
                totam velit. Accusantium consectetur dicta eveniet ex excepturi impedit laudantium, modi numquam quidem
                repudiandae vitae!
            </x-text.paragraph>

            <x-button.button variant="primary">
                Primary button
            </x-button.button>

            <x-button.button variant="secondary">
                Secondary button
            </x-button.button>

            <x-button.button variant="danger">
                Danger button
            </x-button.button>

            <x-button.button variant="success">
                Success button
            </x-button.button>

            <x-button.button variant="black">
                Black button
            </x-button.button>

            <x-button.button variant="gray">
                Gray button
            </x-button.button>

            <x-button.button variant="secondary-transparent">
                Secondary transparent
            </x-button.button>

            <x-button.button variant="danger-transparent">
                Danger transparent
            </x-button.button>


            <x-button.button variant="success-transparent">
                Success transparent
            </x-button.button>
        </x-cards.main-card>

        <x-cards.main-card>
            <x-form.form action="#">
                <x-form.label for="name">
                    Nombre:
                    <x-form.input name="name"/>
                </x-form.label>


                <x-form.file-input name="file"/>

                <div class="my-5"></div>

                <x-form.checkbox name="optional" id="yes"/>

                <div class="flex items-center flex-row gap-2 my-6">

                    <x-form.label for="genre">
                        Masculino
                        <x-form.radiobutton id="male" name="genre"/>
                    </x-form.label>

                    <x-form.label for="genre">
                        Femenino
                        <x-form.radiobutton id="female" name="genre"/>
                    </x-form.label>
                </div>

                <x-form.label for="countries">
                    Países
                    <x-form.select name="countries">
                        <x-form.option>
                            Guatemala
                        </x-form.option>
                        <x-form.option>
                            El Salvador
                        </x-form.option>
                        <x-form.option>
                            Honduras
                        </x-form.option>

                    </x-form.select>

                </x-form.label>

                <x-form.form-group>
                    <x-button.button type="submit">
                        Send Form
                    </x-button.button>
                </x-form.form-group>

            </x-form.form>
        </x-cards.main-card>

        <x-cards.main-card>
            <x-table.table-wrapper>
                <x-table.table>
                    <x-table.thead>
                        <x-table.row>
                            <x-table.column type="thead">
                                Nombre
                            </x-table.column>
                            <x-table.column type="thead">
                                Apellido
                            </x-table.column>
                            <x-table.column type="thead">
                                Actions
                            </x-table.column>
                        </x-table.row>
                    </x-table.thead>
                    <x-table.tbody>
                        <x-table.row>
                            <x-table.column>
                                Henry
                            </x-table.column>
                            <x-table.column>
                                Xitimul
                            </x-table.column>

                            <x-table.column>
                                <x-button.button variant="secondary-transparent">
                                    Editar
                                </x-button.button>
                            </x-table.column>
                        </x-table.row>
                        <x-table.row>
                            <x-table.column>
                                Jose
                            </x-table.column>
                            <x-table.column>
                                Rodriguez
                            </x-table.column>
                            <x-table.column>
                                <x-button.button variant="secondary-transparent">
                                    Editar
                                </x-button.button>
                            </x-table.column>
                        </x-table.row>
                    </x-table.tbody>
                </x-table.table>
            </x-table.table-wrapper>
        </x-cards.main-card>
    </div>


</x-layouts.app>
