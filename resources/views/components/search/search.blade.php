@props(['route' => '#'])

<div class="max-w-xl my-5">
    <x-form.form
        method="GET"
        :action="route($route)"
    >
        <div class="flex gap-2 justify-between flex-col sm:flex-row">
            <x-form.input name="buscar" placeholder="Buscar usuario" />
            <x-button.button type="submit">Buscar</x-button.button>
        </div>
    </x-form.form>
</div>
