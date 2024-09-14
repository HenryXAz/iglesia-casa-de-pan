<head>
    <title>{{config('app.name')}}</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
<h1 class="text-red-500">Titulo de mi app</h1>

@foreach ($users as $user)
    <p>{{$user->name}}</p>
@endforeach

<div x-data="{show:false}">

    <button @click="show=!show">toggle</button>

    <p x-transition x-transition-duration-500ms  x-show="show">hello world</p>
</div>

</body>
