@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="registration-header">
                        <i class="bi bi-person-add"></i>
                        <h1>Neu hier? Registriere dich jetzt!</h1>
                        <p>Registriere Dich jetzt und werde Teil von TrainDoc. Wir freuen uns darauf, Dich willkommen zu heißen!</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Passwort</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Passwort wiederholen</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="modern-button">
                                    Loslegen
                                </button>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <a style="text-decoration: none;" href="{{route('login')}}">
                                    Doch bereits Mitgleid? Hier gehts zum Login!
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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

    .registration-header {
        text-align: center;
        color: #333;
        padding: 20px;
    }

    .registration-header i {
        font-size: 4em;
        color: #046D8B;
    }

    .registration-header h1 {
        margin-top: 0.5em;
        font-size: 2em;
        color: #334D50;
    }

    .registration-header p {
        font-size: 1em;
        color: #666;
    }

</style>
