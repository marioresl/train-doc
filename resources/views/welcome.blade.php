<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TrainDoc') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body>
    <div id="background" class="d-flex flex-column justify-content-center align-items-center vh-100 ">
        <img src="{{URL::asset('/img/logo_v2.png')}}" alt="Logo">
        <a href="{{route('login')}}" class="modern-button mt-3" style="text-decoration: none;">
            @if(Auth::check())
                Fortfahren...
            @else
                Starten
            @endif
        </a>
    </div>

</body>
<style>
    .modern-button {
        padding: 10px 20px;
        border: none;
        background-image: linear-gradient(to right, #6DD5FA, #FF758C);
        color: white;
        font-size: 20px;
        font-weight: bold;
        border-radius: 30px;
        cursor: pointer;
        outline: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .modern-button:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
    }

    #background {
        --s: 250px; /* control the size */
        --c1: #FF847C;
        --c2: #E84A5F;
        --c3: #FECEA8;
        --c4: #99B898;

        background:
            conic-gradient(from  45deg at 75% 75%, var(--c3) 90deg,var(--c1) 0 180deg,#0000 0),
            conic-gradient(from -45deg at 25% 25%, var(--c3) 90deg,#0000 0),
            conic-gradient(from -45deg at 50% 100%,#0000 180deg,var(--c3) 0),
            conic-gradient(from -45deg,var(--c1) 90deg, var(--c2) 0 225deg,var(--c4) 0);
        background-size: var(--s) var(--s);

    }
</style>
