@extends('layouts.app')

@section('content')
    <x-container>
        <x-sleek::card>
            <strong>Willkommen und danke für Ihre Registrierung!</strong>
            <div>
                Bitte vervollständige noch ein paar kurze Angaben, um deinen Registrierungsprozess abzuschließen. Deine Informationen werden streng vertraulich behandelt.
                Wenn du Fragen hast, schreibe eine E-Mail an <a href="mailto:mario@resl.info">mario@resl.info</a>.
            </div>
            <br>
            <div>
                Wir freuen uns darauf, dich bei uns zu haben!
            </div>
            <hr>
            <x-sleek::form
                action="{{route('users.personalData.store', $user)}}"
            >
                <x-sleek::form-field name="firstname" label="{{__('users.fields.firstname')}}" required></x-sleek::form-field>
                <x-sleek::form-field name="lastname" label="{{__('users.fields.lastname')}}" required></x-sleek::form-field>
                <x-sleek::form-field name="phone" label="{{__('users.fields.phone')}}"></x-sleek::form-field>
                <x-sleek::form-field name="addresse" label="{{__('users.fields.addresse')}}"></x-sleek::form-field>
                <x-sleek::form-actions></x-sleek::form-actions>
            </x-sleek::form>
        </x-sleek::card>
    </x-container>
@endsection
