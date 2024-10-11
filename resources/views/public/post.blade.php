<x-layouts.guest>
    @vite('resources/js/posts_section.js')

    <div class="flex md:flex-row flex-col gap-4 items-center md:items-start justify-between max-w-5xl mx-auto">
        <x-text.paragraph>
            Publicación de <span class="font-bold">
               {{$post->user->member->name}} {{$post->user->member->last_name}}
            </span>
        </x-text.paragraph>

        <x-text.paragraph >
                {{\App\Services\Common\DateService::articleFormatDate($post->created_at)}}

                @if($post->created_at !== $post->updated_at)
                    (Editado el {{\App\Services\Common\DateService::articleFormatDate($post->updated_at)}} )

                @endif
        </x-text.paragraph>
    </div>

    <x-cards.main-card class=" max-w-5xl mt-10 dark:text-dark-text text-light-text">
        @if (count($post->images) > 0)
            <div x-data="slide_component"
                 x-init="setSlides({{json_encode($post->images)}})"

                 class="relative mx-auto mb-10 max-w-5xl overflow-hidden">

                <!-- previous button -->
                <button type="button"
                        class="absolute left-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
                        aria-label="previous slide" x-on:click="previous()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                         stroke-width="3" class="size-5 md:size-6 pr-0.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/>
                    </svg>
                </button>

                <!-- next button -->
                <button type="button"
                        class="absolute right-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
                        aria-label="next slide" x-on:click="next()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                         stroke-width="3" class="size-5 md:size-6 pl-0.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                    </svg>
                </button>

                </p>
                <!-- slides -->
                <!-- Change min-h-[50svh] to your preferred height size -->
                <div class="relative min-h-[50svh] w-full">
                    <template x-for="(slide, index) in slides">

                        </pcl>
                        <div x-show="currentSlideIndex == index + 1" class="absolute inset-0"
                             x-transition.opacity.duration.1000ms>

                            <img
                                class="absolute w-full h-full object-scale-down inset-0 object-cover text-neutral-600 dark:text-neutral-300"
                                {{--                                 x-bind:src="`http://iglesia.local/${slide.url}`" --}}
                                x-bind:src="`${domain}/${slide.url}`"
                            />
                        </div>
                    </template>
                </div>

                <!-- indicators -->
                <div
                    class="absolute rounded-md bottom-3 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-4 md:gap-3 bg-white/75 px-1.5 py-1 md:px-2 dark:bg-neutral-950/75"
                    role="group" aria-label="slides">
                    <template x-for="(slide, index) in slides">
                        <button class="size-2 cursor-pointer rounded-full transition bg-neutral-600 dark:bg-neutral-300"
                                x-on:click="currentSlideIndex = index + 1"
                                x-bind:class="[currentSlideIndex === index + 1 ? 'bg-neutral-600 dark:bg-neutral-300' : 'bg-neutral-600/50 dark:bg-neutral-300/50']"
                                x-bind:aria-label="'slide ' + (index + 1)"></button>
                    </template>
                </div>
            </div>

        @endif


        {!! html_entity_decode($post->content)  !!}
    </x-cards.main-card>

</x-layouts.guest>