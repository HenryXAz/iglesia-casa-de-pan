<x-layouts.guest>
    <div class="max-w-4xl mx-auto">
        <x-text.title>
            Contacta con nosotros
        </x-text.title>
    </div>

    <x-cards.main-card class="flex gap-2 max-w-7xl">
        <div class="w-1/2 p-5 ">
            <x-text.subtitle class="mb-5">
                ¿Tienes alguna consulta específica? <br>Contacta con nosotros
            </x-text.subtitle>

            <x-text.paragraph>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus rutrum mi at commodo fermentum. Aenean finibus non ante ac pulvinar. Nam vel mi porta, malesuada felis vitae, rhoncus metus. Donec in leo semper lacus iaculis malesuada. Morbi at felis sed nunc suscipit mattis in eget velit. Nam risus turpis, efficitur nec ligula eu, laoreet vestibulum turpis. Nunc nec ullamcorper sapien. Nam mi dui, lobortis efficitur pharetra eget, porttitor eget nunc. Quisque blandit sit amet sem eu feugiat.
            </x-text.paragraph>

            <div class="my-10">
                <x-text.subtitle>
                    <svg viewBox="0 0 24 24" width="30px" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#db1f1f"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z" stroke="#ec3232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 12C13.1046 12 14 11.1046 14 10C14 8.89543 13.1046 8 12 8C10.8954 8 10 8.89543 10 10C10 11.1046 10.8954 12 12 12Z" stroke="#ec3232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    <span>Localización</span>
                </x-text.subtitle>
                <x-text.paragraph>
                    Cantel, Quetzaltenango
                </x-text.paragraph>
            </div>


            <div class="mt-5">
                <x-text.subtitle>
                    <svg viewBox="0 -2.5 20 20" width="30px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>email [#1572]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-340.000000, -922.000000)" fill="#5017a6"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M294,774.474 L284,765.649 L284,777 L304,777 L304,765.649 L294,774.474 Z M294.001,771.812 L284,762.981 L284,762 L304,762 L304,762.981 L294.001,771.812 Z" id="email-[#1572]"> </path> </g> </g> </g> </g></svg>
                    Dirección de correo
                </x-text.subtitle>
                <x-text.paragraph>
                    iglesia_casa_de_pan@info.com
                </x-text.paragraph>
            </div>
        </div>

        <div class="w-1/2">
            <x-form.form
                action="#"
                class=" bg-dark-color-1 p-2 rounded-md "
            >
                <x-form.label for="name" class="mb-5">
                    Nombre:
                    <x-form.input name="name" placeholder="Nombre..." id="name" />
                </x-form.label>

                <x-form.label for="content">
                    Mensaje:
                    <textarea class="rounded-md border-zinc-400 dark:border-dark-color-4 resize-none h-48 outline-none p-2 font-light text-base bg-light-color-1 dark:bg-dark-color-3 " name="content" id="content" placeholder="Tu mensaje"></textarea>
                </x-form.label>



                <x-button.button type="submit">
                    Enviar mensaje
                </x-button.button>
            </x-form.form>
        </div>

    </x-cards.main-card>
</x-layouts.guest>
