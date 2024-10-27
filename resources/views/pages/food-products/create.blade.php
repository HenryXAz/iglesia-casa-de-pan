<x-layouts.app>
    <x-cards.container>
        <x-text.title>
            Crear nueva venta de alimentos
        </x-text.title>


        <x-cards.main-card>
            <x-form.form
                :action="route('food_products.store')"
                enctype="multipart/form-data"
            >

                <x-form.label for="title">
                    Título:
                    <x-form.input
                        name="title"
                        id="title"
                        placeholder="Título"
                    />
                </x-form.label>

                <x-form.label for="description">
                    Descripción:
                    <x-form.input
                        name="description"
                        id="description"
                        placeholder="Descripción"
                    />
                </x-form.label>

                <x-form.label for="cost">
                    Costo total:
                    <x-form.input
                        name="cost"
                        id="cost"
                        placeholder="0.00"
                    />
                </x-form.label>


                <x-text.subtitle>
                    Calculadora de precios
                </x-text.subtitle>
                <div
                    class="max-w-xl mx-auto bg-color-2 dark:bg-dark-color-1 my-5 p-2 rounded-md"
                    x-data="{
                       units: 0,
                       pricePerUnit: 0.00,
                       totalReturn: 0.00,
                       calculateTotalReturn() {
                            total = this.units * this.pricePerUnit;
                            this.totalReturn = Math.round((total + Number.EPSILON) * 100) / 100
                       }
                    }"
                >

                    <x-form.label for="units">
                        Unidades totales:
                        <x-form.input
                            type="number"
                            name="units"
                            id="units"
                            x-model="units"

                            @keyup="calculateTotalReturn"
                        />
                    </x-form.label>

                    <x-form.label for="price_per_unit">
                        Precio por unidad:
                        <x-form.input
                            name="price_per_unit"
                            id="price_per_unit"
                            x-model="pricePerUnit"

                            @keyup="calculateTotalReturn"
                        />
                    </x-form.label>

                    <x-form.label for="totalReturn">
                        Retorno total:
                        <x-form.input
                            name="total_return"
                            id="total_return"
                            x-model="totalReturn"
                        />
                    </x-form.label>

                </div>


                <x-form.label for="image">
                    Agregar imagen (Opcional)
                    <x-form.file-input
                        name="image"
                        id="image"
                    />
                </x-form.label>


                <div class="mt-5">
                    <x-button.button
                        type="submit"
                    >
                        Guardar
                    </x-button.button>
                </div>

            </x-form.form>
        </x-cards.main-card>

    </x-cards.container>
</x-layouts.app>
