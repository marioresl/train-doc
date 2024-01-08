@props(['titel' => null])

<div class="container">
    @if($titel)
        <h1>{{$titel}}</h1>
    @endif
    {{ $slot }}
</div>
