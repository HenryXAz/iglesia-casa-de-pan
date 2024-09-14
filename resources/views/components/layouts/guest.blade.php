<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}}</title>

    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="bg-light-color-2 dark:bg-dark-color-1">

<div class="max-w-7xl mx-auto mt-5 flex justify-end">
    <x-toggle-theme.toggle-theme/>
</div>

<main class="my-6 mx-auto container">
    {{$slot}}
</main>

</body>
</html>
