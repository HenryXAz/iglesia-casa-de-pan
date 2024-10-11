<x-layouts.app>
    <div class="m-4">

        <x-success-message.success-message
            message="creation_success"
        />

        <x-error-message.error-message
            for="creation_error"
        />

    <x-text.title>
        Crear Publicación
    </x-text.title>

       <x-pages.posts.form
            :categories="$categories"
       />

{{--        <x-cards.main-card>--}}

{{--            <x-form.form--}}
{{--                enctype="multipart/form-daa"--}}
{{--                :action="route('posts.store')"--}}
{{--            >--}}

{{--            <x-form.label for="title">--}}
{{--                Título de la publicación:--}}
{{--                <x-form.input name="title" id="title" placeholder="Título de publicación" />--}}
{{--                <x-error-message.error-message for="title" />--}}
{{--            </x-form.label>--}}

{{--            <x-form.label for="description">--}}
{{--                Descripción:--}}
{{--                <x-form.input name="description" id="description" placeholder="Descripción" />--}}
{{--                <x-error-message.error-message for="description" />--}}
{{--            </x-form.label>--}}


{{--            <x-form.label for="content" class="mt-5">--}}
{{--                Contenido de la publicación:--}}
{{--                <x-error-message.error-message for="content" />--}}
{{--                <textarea name="content" id="content" class="resize-none"></textarea>--}}

{{--            </x-form.label>--}}

{{--                <x-form.label for="category" class="mt-5">--}}
{{--                    Categoría:--}}

{{--                    <x-form.select name="category" >--}}
{{--                        @foreach($categories as $category)--}}
{{--                            <x-form.option :value="$category->id">--}}
{{--                                {{$category->description}}--}}
{{--                            </x-form.option>--}}
{{--                        @endforeach--}}
{{--                    </x-form.select>--}}
{{--                    <x-error-message.error-message for="category" />--}}
{{--                </x-form.label>--}}

{{--            <div class="flex gap-2 mt-5">--}}

{{--            <x-text.paragraph>--}}
{{--                ¿Está publicada?--}}
{{--            </x-text.paragraph>--}}

{{--            <x-form.label for="published">--}}
{{--                Sí--}}
{{--            </x-form.label>--}}

{{--                <x-form.radiobutton name="is_published" id="published" value="1"  />--}}

{{--            <x-form.label for="unpublished">--}}
{{--                No--}}
{{--            </x-form.label>--}}

{{--                <x-form.radiobutton name="is_published" id="unpublished" value="0"/>--}}

{{--                <x-error-message.error-message for="is_published" />--}}
{{--            </div>--}}


{{--                <x-form.label class="mt-5">--}}
{{--                    <x-text.subtitle>--}}
{{--                        Imágenes (opcional):--}}
{{--                    </x-text.subtitle>--}}
{{--                    <x-form.file-input name="images[]" id="images"--}}
{{--                                       multiple--}}
{{--                                       accept="image/jpg, image/png, image/jpeg"--}}
{{--                    />--}}
{{--                    <x-error-message.error-message for="images" />--}}
{{--                </x-form.label>--}}

{{--                <x-button.button type="submit">--}}
{{--                    Crear--}}
{{--                </x-button.button>--}}
{{--            </x-form.form>--}}


{{--        </x-cards.main-card>--}}

    </div>
</x-layouts.app>
