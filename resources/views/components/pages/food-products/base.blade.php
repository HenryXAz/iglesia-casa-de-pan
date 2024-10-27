<x-layouts.app>
    <div class="m-4">
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
    </div>
</x-layouts.app>
