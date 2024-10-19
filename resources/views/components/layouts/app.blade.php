<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config("app.name") }}</title>
    @vite(["resources/js/app.js", "resources/css/app.css", "resources/js/tinymce.js"])
</head>
<body class="bg-light-color-2 dark:bg-dark-color-1">
<x-sidebar.sidebar class="md:w-[250px] w-full fixed h-full" />

<main class="md:ml-[250px]">
    {{ $slot }}
</main>

</body>
</html>
