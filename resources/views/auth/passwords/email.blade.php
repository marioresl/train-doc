@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="password-reset-header">
                        <i class="bi bi-unlock-fill"></i>
                        <h1>Passwort zurücksetzen</h1>
                        <p>Hast Du Dein Passwort vergessen? Kein Problem, lass uns Dir helfen, ein neues zu erstellen.</p>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
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

                        <div class="row mb-0">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="modern-button">
                                    Passwort zurücksetzen
                                </button>
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

    .password-reset-header {
        text-align: center;
        color: #333;
        padding: 20px;
    }

    .password-reset-header i {
        font-size: 4em;
        color: #046D8B;
    }

    .password-reset-header h1 {
        margin-top: 0.5em;
        font-size: 2em;
        color: #334D50;
    }

    .password-reset-header p {
        font-size: 1em;
        color: #666;
    }

</style>
