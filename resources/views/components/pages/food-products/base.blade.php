<x-layouts.app>
    <x-cards.container>
        <x-tabs.tabs
            :items="[
                [
                    'route' => 'food_products.index',
                    'name' => 'venta de alimentos',
                    'permission' => 'listar venta de alimentos',
                ],
                [
                    'route' => 'food_orders.index',
                    'name' => 'Órdenes',
                    'permission' => 'listar venta de alimentos',
                ],
                [
                    'route' => 'food_deliveries.index',
                    'name' => 'Entregas',
                    'permission' => 'entregar ordenes de venta de alimentos',
                ],
                [
                    'route' => 'food_products_history.index',
                    'name' => 'Historial',
                    'permission' =>  'listar venta de alimentos',
                ],
            ]"
        />

        {{$slot}}
    </x-cards.container>
</x-layouts.app>
