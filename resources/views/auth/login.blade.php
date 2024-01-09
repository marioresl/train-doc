@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="login-header">
                        <i class="bi bi-person-circle"></i>

                        <h1>Willkommen zurück!</h1>
                        <p>Bitte logge dich ein, um fortzufahren.</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Eingeloggt bleiben
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0 mt-3">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="modern-button">
                                    Anmelden
                                </button>


                            </div>
                            <div class="d-flex justify-content-center mt-1">
                                @if (Route::has('password.request'))
                                    <a style="text-decoration: none;" class="btn btn-link" href="{{ route('password.request') }}">
                                        Passwort vergessen?
                                    </a>
                                @endif
                                <a style="text-decoration: none;" class="btn btn-link" href="{{ route('register') }}">
                                    Noch kein Mitglied? Hier anmelden!
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

    .login-header {
        text-align: center;
        color: #333;
        padding: 20px;
    }

    .login-header i {
        font-size: 4em;
        color: #046D8B;
    }

    .login-header h1 {
        margin-top: 0.5em;
        font-size: 2em;
        color: #334D50;
    }

    .login-header p {
        font-size: 1em;
        color: #666;
    }

</style>
