@props(['mode' => 'create', 'category' => \App\Models\Category::class])

<x-cards.main-card class="max-w-[350px]">
<x-form.form
    :action="($mode == 'create') ? route('posts.categories.store') : route('posts.categories.update', $category->id)"
>
    @if($mode == 'edit')
        @method('PUT')
    @endif

    <x-form.label for="description">
        Descripción:
        <x-form.input name="description" id="description" placeholder="Descripción"
            :value="($mode == 'edit') ? $category->description : ''"
        />
        <x-error-message.error-message for="description" />
    </x-form.label>

    <x-button.button type="submit">
        {{
        ($mode == 'create')
        ?
            __('Crear')
        :
           __('Actualizar')
        }}
    </x-button.button>
</x-form.form>
</x-cards.main-card>
