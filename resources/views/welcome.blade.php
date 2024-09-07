<head>
    <title>{{config('app.name')}}</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
<h1>Titulo de mi app</h1>

@foreach ($users as $user)
    <p>{{$user->name}}</p>
@endforeach
</body>
