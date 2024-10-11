@props(['mode' => 'create', 'post' => \App\Models\Post::class, 'categories', \App\Models\Category::class])

<x-cards.main-card>

    <x-form.form
        enctype="multipart/form-data"
        :action="($mode == 'create') ? route('posts.store'): route('posts.update', $post->id)"
    >
        @if($mode == 'edit')
            @method('PUT')
        @endif

        <x-form.label for="title">
            Título de la publicación:
            <x-form.input name="title" id="title" placeholder="Título de publicación"
                          :value="($mode == 'edit') ? $post->title : ''"
            />
            <x-error-message.error-message for="title"/>
        </x-form.label>

        <x-form.label for="description">
            Descripción:
            <x-form.input name="description" id="description" placeholder="Descripción"
                          :value="($mode == 'edit') ? $post->description : ''"
            />
            <x-error-message.error-message for="description"/>
        </x-form.label>


        <x-form.label for="content" class="mt-5">
            Contenido de la publicación:
            <x-error-message.error-message for="content"/>
            <textarea name="content" id="content" class="resize-none"
            >{{($mode == 'edit') ? $post->content : ''}}</textarea>

        </x-form.label>

        <x-form.label for="category" class="mt-5">
            Categoría:

            <x-form.select name="category">
                @foreach($categories as $category)
                    <x-form.option :value="$category->id"
                                   :selected="$mode == 'edit' && $post->category->description == $category->description"
                    >
                        {{$category->description}}
                    </x-form.option>
                @endforeach
            </x-form.select>
            <x-error-message.error-message for="category"/>
        </x-form.label>

        <div class="flex gap-2 mt-5">

            <x-text.paragraph>
                ¿Está publicada?
            </x-text.paragraph>

            <x-form.label for="published">
                Sí
            </x-form.label>

            <x-form.radiobutton name="is_published" id="published" value="1"
                                :checked="$mode == 'edit' && $post->is_published == true"
            />

            <x-form.label for="unpublished">
                No
            </x-form.label>

            <x-form.radiobutton name="is_published" id="unpublished" value="0"
                                :checked="$mode == 'edit' && $post->is_published == false"
            />

            <x-error-message.error-message for="is_published"/>
        </div>


            <x-form.label class="mt-5">
                <x-text.subtitle>
                    Imágenes (opcional):
                </x-text.subtitle>
                <x-form.file-input name="images[]" id="images"
                                   multiple
                                   accept="image/jpg, image/png, image/jpeg"
                />
                <x-error-message.error-message for="images"/>
            </x-form.label>

        <x-button.button type="submit">
            {{ ($mode == 'create')
            ?
                __('Crear')
            :
                __('Actualizar')
            }}
        </x-button.button>

    </x-form.form>
</x-cards.main-card>
