<x-layouts.app>

    <div x-data="{show:false}" class="p-4">

        <x-button.button @click="show=!show">toggle</x-button.button>

        <p x-transition x-show="show" x-transition class="text-gray-200" >
            pdsfksfdljj
        </p>

    </div>
</x-layouts.app>
