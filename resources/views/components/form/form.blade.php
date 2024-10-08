@props(['method' => 'POST', 'action'])

<form method="{{$method}}" action="{{$action}}" {{$attributes}} >
    @csrf
    {{$slot}}
</form>
