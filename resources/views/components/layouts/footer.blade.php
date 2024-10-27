<div class="w-full mt-5 bg-light-color-2 dark:bg-dark-color-1">
    <footer class="rounded-lg m-4">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="{{asset('images/logo.svg')}}" class="h-12" alt="Iglesia Casa de Pan y Alabanza Logo" />
                </a>
                <ul class="flex flex-wrap list-none items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="{{route('home')}}" class="hover:underline me-4 text-light-text dark:text-dark-text md:me-6">Inicio</a>
                        @if(Auth::user())
                            <a href="{{route('blog')}}" class="hover:underline me-4 text-light-text dark:text-dark-text md:me-6">Blog</a>
                        @endif
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-300 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">
                © {{\Carbon\Carbon::now()->format('Y') }} <a href="https://flowbite.com/" class="hover:underline">Iglesia Casa de Pan y Alabanza</a>. Todos los derechos reservados.</span>
        </div>
    </footer>
</div>
