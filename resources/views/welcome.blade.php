<x-layouts.app>

    <div x-data="{show:false}" class="p-4 mb-3">

        <x-button.button @click="show=!show">toggle</x-button.button>

        <p x-transition x-show="show" x-transition class="text-gray-200" >
            pdsfksfdljj
        </p>


    </div>


    <form name="form_test" id="form_test" method="POST" action="{{route('post.test')}}" >
        @csrf
        <textarea id="content" name="content" class="my-5"></textarea>

        <button type="submit">send form</button>
    </form>

</x-layouts.app>
