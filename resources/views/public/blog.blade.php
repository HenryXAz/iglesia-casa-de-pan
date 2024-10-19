@php
use \App\Services\Common\DateService;

@endphp

<x-layouts.guest>
    @foreach($posts as $post)
        <a
            href="{{route('blog.show', $post->id)}}"
            class="max-w-3xl block mx-auto"
        >
            <article>
                <x-cards.main-card >
                    <x-text.paragraph class="mb-5">
                        <span class="font-bold">Autor </span>
                        {{$post->user->member->name}} {{$post->user->member->last_name}}
                    </x-text.paragraph>

                    <div class="flex md:flex-row flex-col justify-between items-center">
                        <div class="mb-5 md:mb-0">
                            <x-text.title class="font-bold">{{$post->title}}</x-text.title>
                            <x-text.paragraph>
                                {{$post->description}}
                            </x-text.paragraph>
                        </div>

                        <div>
                            @if (count($post->images) == 0)
                                <x-icons.unavailable-image />
                            @else
                                <img
                                    src="{{asset($post->images[0]->url)}}"
                                    alt="{{$post->title}}"
                                    class="h-48 object-scale-down rounded-xl"
                                />
                            @endif
                        </div>
                    </div>

                    <div class="flex gap-2 items-center justify-between w-full mt-5 md:mt-0 md:w-2/3">
                        <x-text.paragraph>
                            {{ DateService::dateToMonth($post->created_at->format('m')) }}  {{$post->created_at->format('Y')}}
                        </x-text.paragraph>

                        <x-text.paragraph>
                            <span class="font-bold">Categoría:</span>
                            {{$post->category->description}}
                        </x-text.paragraph>
                    </div>
                </x-cards.main-card>

            </article>
        </a>
    @endforeach


        <div class="max-w-xl mx-auto ">
            {{$posts->links()}}
        </div>
</x-layouts.guest>
