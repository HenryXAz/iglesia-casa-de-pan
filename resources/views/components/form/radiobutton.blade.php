@props(['name' => '', 'id' => '', 'value' => '', 'class' => '', 'checked' => 'false'])

<input
    type="radio"
    name="{{$name}}"
    id="{{$id}}"
    value="{{$value}}"
    class="{{$class . " "}}"
    @checked($checked)
/>
