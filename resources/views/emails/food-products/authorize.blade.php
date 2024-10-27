@vite('resources/css/app.css')

<x-cards.container>
    <x-cards.main-card class="max-w-xl">
        <div class="mb-5">
            <img src="{{asset('/images/logo.svg')}}" alt="logo" width="75">
        </div>

        <x-text.paragraph position="justify">
            Se acaba de registrar una nueva actividad de venta de alimentos, haciendo click <br>
            en el botón de abajo podrá revisar y autorizar dicha actividad.
        </x-text.paragraph>

        <div class="mt-5">

            <x-button.button
                target="_blank"
                :href="route('food_products.authorize_food_product.view', $foodProductId)"
            >
                Revisar
            </x-button.button>
        </div>
    </x-cards.main-card>
</x-cards.container>
