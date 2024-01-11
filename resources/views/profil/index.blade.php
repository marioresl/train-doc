@extends('layouts.app')

@section('content')
    <x-container titel="Profil">
        <x-sleek::card>
            <div x-data="{ editMode: false }" class="row">
                <div class="col-md-7 col-12 ">
                    <!-- Anzeigemodus -->
                    <template x-if="!editMode">
                        <dl>
                            <dt>Vorname</dt>
                            <dd>{{$user->personalData->firstname ?? 'k.A.'}}</dd>

                            <dt>Nachname</dt>
                            <dd>{{$user->personalData->lastname ?? 'k.A.'}}</dd>

                            <dt>Geburtstag</dt>
                            <dd>{{$user->personalData->birthday->format('d.m.Y') ?? 'k.A.'}}</dd>

                            <dt>E-Mail</dt>
                            <dd>{{$user->email ?? 'k.A.'}}</dd>

                            <dt>Telefon</dt>
                            <dd>{{$user->personalData->phone ?? 'k.A.'}}</dd>

                            <dt>Adresse</dt>
                            <dd>{{$user->personalData->address ?? 'k.A.'}}</dd>
                        </dl>
                    </template>

                    <!-- Bearbeitungsmodus -->
                    <template x-if="editMode">
                        <form action="{{route('profil.update')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <x-sleek::form-field key="users" name="firstname" value="{{$user->personalData->firstname}}" required/>
                            <x-sleek::form-field key="users" name="lastname" value="{{$user->personalData->lastname}}" required/>
                            <x-sleek::form-field key="users" type="date" name="birthday" value="{{$user->personalData->birthday->format('Y-m-d')}}" required/>
                            <x-sleek::form-field key="users" name="phone" value="{{$user->personalData->phone}}" />
                            <x-sleek::form-field key="users" name="address" value="{{$user->personalData->address}}" />

                            <button type="submit" class="btn btn-primary">Speichern</button>
                        </form>
                    </template>
                </div>
                <div class="col-md-5 col-12">
                    <button class="btn btn-secondary w-100" @click="editMode = !editMode" x-text="editMode ? 'Abbrechen' : 'Bearbeiten'"></button>
                </div>
            </div>
        </x-sleek::card>
    </x-container>
@endsection
